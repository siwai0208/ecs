# **Laravel App on ECS**

## **About**
ECSでweb,appコンテナ+RDSでアプリを動作させる

## **Inside Package**
 * web nginx
 * app php7.3fpm:alpine
 * DBはAWSのRDSを使用

## **手順**

### 0. RDS構築済みであること
Cloudformation で RDSを作成
以下パラメータを控えておく
 DBName
 DBUser
 DBPassword
 DBInstanceEndpointAddress

### 1. ECRレポジトリの作成
AWSマネコンで　ECR > リポジトリ > リポジトリを作成
* 可視性設定　プライベート
* リポジトリ名　Laravel-app-ecs(例)
* リポジトリを作成

### 2. Imageの保存
* Docker クライアントを認証
マネコンの「プッシュコマンドの表示」をクリックし、ポップアップの内容に従いローカルターミナルで以下を実行
```
aws ecr get-login-password --region ap-northeast-1 | docker login --username AWS --password-stdin xxxxxxxxxxxx.dkr.ecr.ap-northeast-1.amazonaws.com
...

Login Succeeded　←成功
```

* ローカル環境でDockerイメージを構築
```
docker-compose build
```

* イメージにタグ付け
docker images コマンドで ecs-pipeline__webと、ecs-pipeline__appの2つがビルドされていることを確認し、それぞれのイメージにタグ付けをする

```
docker images
 REPOSITORY        TAG 
 ecs_web  latest
 ecs_app  latest

docker tag ecs_web:latest 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/laravel-app-ecs:web
docker tag ecs_app:latest xxxxxxxxxxxx.dkr.ecr.ap-northeast-1.amazonaws.com/laravel-app-ecs:app
```

* DockerイメージをECRリポジトリにPUSH

```
docker push 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/laravel-app-ecs:web
docker push 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/laravel-app-ecs:app
```

* 確認
マネコンで ECR > リポジトリ > laravel-app-ecs（例）でweb, appの2つのイメージが保存されていることを確認する

### 3. ECS Clusterの作成

* マネコンで Amazon ECS > クラスター > クラスターの作成
<br>クラスターテンプレート
<br>EC2 Linux + ネットワーキング
<br>
<br>クラスターの設定
<br>クラスター名　ecs-cluster（例）
<br>
<br>インスタンスの設定
<br>EC2 インスタンスタイプ　t2.micro
<br>インスタンス数　1
<br>キーペア　自身のSSH-KEY
<br>
<br>ネットワーキング
<br>VPC　既存VPCを選択、RDSと同一VPCであること
<br>サブネット　パブリック
<br>セキュリティグループ　WEB・SSHの許可
<br>

* 確認
<br>クラスター > ecs-cluster　のステータス画面で
<br>EC2 > コンテナインスタンス が 1 であること

### 4. タスク定義の作成

* Amazon ECS > タスク定義 > 新しいタスク定義の作成
<br>
<br>起動タイプ　EC2
<br>
<br>タスクとコンテナの定義の設定
<br>タスク定義名　ecs-cluster-task
<br>タスクロール　ecsTaskExecutionRole
<br>
<br>コンテナの定義 > コンテナの追加
<br>
<br>webコンテナの設定
<br>スタンダード
<br>コンテナ名　web
<br>イメージ  ECRレポジトリのwebイメージのURIをコピペ
<br>メモリ制限 (MiB)*　ハード制限・300
<br>ポートマッピング　80:80
<br>
<br>ネットワーク設定
<br>リンク　app:app
<br>
<br>appコンテナの設定
<br>スタンダード
<br>コンテナ名　app
<br>イメージ  ECRレポジトリのappイメージのURIをコピペ
<br>メモリ制限 (MiB)*　ハード制限・600
<br>
<br>環境
<br>環境変数　以下のRDS接続パラメータを設定
<br>DB_HOST　Value　RDSのエンドポイントをコピペ
<br>DB_NAME　Value　RDSで作成したデータベース名
<br>DB_USER　Value　RDSで作成したユーザー名
<br>DB_PASSWORD　Value　RDSで作成したパスワード
<br>
<br>作成

* 続けてサービスの作成　アクション > サービスの作成
<br>
<br>起動タイプ　EC2
<br>サービス名　laravel-app-ecs（例）
<br>サービスタイプ　REPLICA
<br>タスクの数　1
<br>デプロイメントタイプ　ローリングアップデート
<br>
<br>次のステップで画面を進め、サービスの作成
<br>

* 確認
<br>クラスター > ecs-cluster　のステータス画面でEC2 > 実行中のタスク が 1 であること

* アプリへのアクセス
<br>クラスター > ecs-cluster の詳細画面を表示
<br>タスク タブで実行中のコンテナインスタンスを選択
<br>パブリックIPを確認しSSHでアクセス
<br>docker ps でCONTAINER IDの確認
<br>docker exec -it <CONTAINER ID> bash
<br>php artisan migrate
<br>php artisan db:seed
<br>パブリックIPを確認しブラウザでアクセス -> Laravelアプリが表示されること
