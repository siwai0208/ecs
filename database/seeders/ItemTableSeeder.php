<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('items')->truncate(); //2回目実行の際にシーダー情報をクリア
      DB::table('items')->insert([
         'name' => 'トムヤムクン',
         'detail' => '本場タイの味',
         'price' => '80',
         'imgpath' => 'トムヤムクン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'カオマンガイ',
         'detail' => '本場タイの味',
         'price' => '40',
         'imgpath' => 'カオマンガイ.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ガパオライス',
         'detail' => '本場タイの味',
         'price' => '50',
         'imgpath' => 'ガパオライス.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'プー・パッポンカレー',
         'detail' => '本場タイの味',
         'price' => '200',
         'imgpath' => 'プー・パッポンカレー.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'グリーンカレー',
         'detail' => '本場タイの味',
         'price' => '150',
         'imgpath' => 'グリーンカレー.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'パッタイ（エビ）',
         'detail' => '本場タイの味',
         'price' => '120',
         'imgpath' => 'パッタイ（エビ）.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'パッタイ（豚）',
         'detail' => '本場タイの味',
         'price' => '100',
         'imgpath' => 'パッタイ（豚）.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ラーブ（アヒル）',
         'detail' => '本場タイの味',
         'price' => '60',
         'imgpath' => 'ラーブ（アヒル）.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'コムヤーン',
         'detail' => '本場タイの味',
         'price' => '60',
         'imgpath' => 'コムヤーン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ガイヤーン',
         'detail' => '本場タイの味',
         'price' => '90',
         'imgpath' => 'ガイヤーン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'クイッティアオ',
         'detail' => '本場タイの味',
         'price' => '30',
         'imgpath' => 'クイッティアオ.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ソムタム・タイ',
         'detail' => '本場タイの味',
         'price' => '50',
         'imgpath' => 'ソムタム・タイ.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'プラーガポン・トート・ナンプラー',
         'detail' => '本場タイの味',
         'price' => '200',
         'imgpath' => 'プラーガポン・トート・ナンプラー.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ガイトートナンプラー',
         'detail' => '本場タイの味',
         'price' => '60',
         'imgpath' => 'ガイトートナンプラー.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ムートートナンプラー',
         'detail' => '本場タイの味',
         'price' => '80',
         'imgpath' => 'ムートートナンプラー.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'マッサマンカレー',
         'detail' => '本場タイの味',
         'price' => '130',
         'imgpath' => 'マッサマンカレー.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'クンパオ',
         'detail' => '本場タイの味',
         'price' => '200',
         'imgpath' => 'クンパオ.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'カオソイ',
         'detail' => '本場タイの味',
         'price' => '60',
         'imgpath' => 'カオソイ.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ヤムウンセン',
         'detail' => '本場タイの味',
         'price' => '50',
         'imgpath' => 'ヤムウンセン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'サーモン刺身',
         'detail' => '日本の味',
         'price' => '180',
         'imgpath' => 'サーモン刺身.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'サーモンにぎり',
         'detail' => '日本の味',
         'price' => '80',
         'imgpath' => 'サーモンにぎり.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'サーモン丼',
         'detail' => '日本の味',
         'price' => '150',
         'imgpath' => 'サーモン丼.jpg',
      ]);

      DB::table('items')->insert([
         'name' => '餃子（30個）',
         'detail' => '日本の味',
         'price' => '300',
         'imgpath' => '餃子（30個）.jpg',
      ]);

      DB::table('items')->insert([
         'name' => '豚骨ラーメン',
         'detail' => '日本の味',
         'price' => '200',
         'imgpath' => '豚骨ラーメン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => '豚やきそば',
         'detail' => '日本の味',
         'price' => '180',
         'imgpath' => 'やきそば.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'トムヤムラーメン',
         'detail' => '日本の味',
         'price' => '150',
         'imgpath' => 'トムヤムラーメン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'カレーライス',
         'detail' => '日本の味',
         'price' => '150',
         'imgpath' => 'カレーライス.jpg',
      ]);

      DB::table('items')->insert([
         'name' => '焼き鳥セット',
         'detail' => '日本の味',
         'price' => '150',
         'imgpath' => '焼き鳥セット.jpg',
      ]);

      DB::table('items')->insert([
         'name' => '焼きサバ定食',
         'detail' => '日本の味',
         'price' => '250',
         'imgpath' => '焼きサバ定食.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'たこやき',
         'detail' => '日本の味',
         'price' => '100',
         'imgpath' => 'たこやき.jpg',
      ]);

      DB::table('items')->insert([
         'name' => '醤油ラーメン',
         'detail' => '日本の味',
         'price' => '200',
         'imgpath' => '醤油ラーメン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ハンバーグ定食',
         'detail' => '日本の味',
         'price' => '250',
         'imgpath' => 'ハンバーグ定食.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'かつ丼',
         'detail' => '日本の味',
         'price' => '190',
         'imgpath' => 'かつ丼.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'えび天丼',
         'detail' => '日本の味',
         'price' => '160',
         'imgpath' => 'えび天丼.jpg',
      ]);

      DB::table('items')->insert([
         'name' => '豚丼',
         'detail' => '日本の味',
         'price' => '140',
         'imgpath' => '豚丼.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ピザ・マルゲリータ',
         'detail' => 'イタリアの味',
         'price' => '240',
         'imgpath' => 'ピザ・マルゲリータ.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'ピザ・ハワイアン',
         'detail' => 'イタリアの味',
         'price' => '240',
         'imgpath' => 'ピザ・ハワイアン.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'カルボナーラ',
         'detail' => 'イタリアの味',
         'price' => '110',
         'imgpath' => 'カルボナーラ.jpg',
      ]);

      DB::table('items')->insert([
         'name' => 'トマトスパゲッティ',
         'detail' => 'イタリアの味',
         'price' => '100',
         'imgpath' => 'トマトスパゲッティ.jpg',
      ]);

    }
}
