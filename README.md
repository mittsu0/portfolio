## ONEDARI
未経験・独学でポートフォリオを作成しました。
特定の地域において、ユーザーが欲しい物やサービスを共有するアプリです。
サービス名は「ONEDARI(オネダリ)」とし、コンセプトは「地域の需要を可視化する」としました。

### URL

* アプリ: https://onedari-app.com
* Qiita: https://qiita.com/mittsu0/items/4ad2e5359b21e3934d38

#### 投稿一覧画面（ホーム画面）

![](/images/index.ping)

![](/images/index_popularity.png.ping)

![](/images/index.gif)

* ユーザーの投稿を一覧表示します。
* ヘッダーナビの検索ボタンから投稿の絞り込みができます。
（絞り込み条件：キーワード、エリア、カテゴリ）
* 新着順、もしくは人気順(Good順)で投稿の並べ替えができます。

#### 新規投稿画面

![](/images/create_new_post.png)

![](/images/new_post.ping)

![](/images/new_post.gif.ping)

* ヘッダーナビの投稿ボタンから新規投稿画面に移動できます。
* タイトル、エリア、カテゴリ、本文、ID表示の有無を選択して投稿します。

#### 投稿詳細画面

![](/images/post_details_good.gif.ping)

![](/images/post_details_comment.gif.ping)

* 一覧画面で個々の投稿をクリックすると詳細画面に移動します。
* 投稿に対してGoodやBadをつけたり、コメントを投稿することができます。

## 機能一覧
* 投稿一覧表示
* 投稿絞り込み
* 投稿並べ替え
* 投稿一覧のページネーション
* 新規投稿
* 投稿詳細表示
* 投稿へのGood / Bad
* 投稿へのコメント
* お問い合わせフォーム

## 使用技術

### フロントエンド
* HTML
* CSS
* Bootstrap 5.1.3
* Vue.js 2.6.14

### バックエンド
* PHP 8.0.23
* Laravel 8.83.23
* MYSQL 8.0.28

### 開発環境
* Docker 20.10.17 / Docker Compose 2.7.0
    * Nginxコンテナ
    * Appコンテナ
        * PHP
        * laravel
        * vue.js
    * DBコンテナ
        * MYSQL
    * MinIOコンテナ（画像を保存するためのストレージ）

### 本番環境
* AWS: ECS(Fargate), RDS, Route 53, ALB, ACM, S3, VPC, IAM 

## DB設計

ユーザー登録機能がないのでusersテーブルはありません。
その代わりに、各テーブルにuidカラムをもたせることでユーザーの紐付けを行っています。
uidは、クライントのIPアドレスと日付等から生成しています。

![](/images/er.drawio.png)

## インフラ構成

* ECS（Fargate）を利用し、Webサーバーとアプリケーションサーバーのコンテナを立てました。
* データベースはRDS、画像保存用の外部ストレージはS3を使用しています。
* ELB（ALB）はACMを利用してhttps化することと、Fargateのヘルスチェックのために使用しています。

![](/images/structure.drawio.png)