RDS用意できている 　DB_HOST RDSエンドポイント DB_NAME laravel 　DB_USERNAME RDSユーザー名 　DB_PASSWORD RDSパスワード

git clone する docker-compse build docker imagesで　ecs-webとecs-appのlatestを見る

ECR作成

マネコンでプッシュコマンドの表示 aws ecr get-login-password --region ap-northeast-1 | docker login --username AWS --password-stdin 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com ＞Login Succeeded

tagづけ docker tag ecs_web:latest 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/ecs:web docker tag ecs_app:latest 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/ecs:app

upload docker push 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/ecs:web docker push 551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/ecs:app

upload完了

Cluster EC2 linux ネットワーキング 名　ecs-cluster t2.micro KEY ec-app（オプション） 　VPC 　サブネット（パブリック） 　SecurityGroup

タスク定義 　新しいタスク定義 　　EC2 　　name　ecs-task 　　role　ecsTaskExecute 　　コンテナ追加 　　　web 　　　イメージ　551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/ecs:web 　　　memory 300 　　　ポート 80:80/tcp 　　　リンク app:app 　　　app 　　　イメージ　551419436295.dkr.ecr.ap-northeast-1.amazonaws.com/ecs:app 　　　memory 600 　　　環境変数 　　　DB_HOST 　作成

アクション、タスク実行　php, artisan, migrate アクション、タスク実行　php, artisan, db:seed アクション 　サービスの作成 　　EC2 　　サービス名　laravel-sample-app 　　タスク数　1 　　AZバランス 　作成