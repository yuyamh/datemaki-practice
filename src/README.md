# ⭐️ アプリ概要
### タイトル名：だてまき
Github：
**[https://github.com/yuyamh/datemaki-blade](https://github.com/yuyamh/datemaki-blade)**

<!-- ここでQiita記事へのリンク貼る -->

![top](https://github.com/yuyamh/datemaki-blade/assets/97832522/36210e52-df0d-4fdc-9b8c-c64d31298565)

## コンセプト
 - 日本語教師に向けた、教案（教育現場で使用される授業計画や指導案）を自由に共有・検索できるWebアプリケーションです。
 - 投稿することで、作成した教案・教材をユーザーに簡単にシェアできます。
 - 他のユーザーが投稿した教案や教材の検索・ダウンロードが可能です。

## 特徴
 - 教案や教材の画像・ファイルアップロード機能
 - 学習者の日本語レベル、使用テキスト、キーワード、ユーザー名からの投稿検索機能
 - 気に入った投稿のブックマーク機能

<br>

## 使用画面のイメージ
### ホーム画面
![top](https://github.com/yuyamh/datemaki-blade/assets/97832522/36210e52-df0d-4fdc-9b8c-c64d31298565)

### 投稿一覧画面
ユーザーが投稿した教案、教材、授業のアイディアを見ることができます。
![index](https://github.com/yuyamh/datemaki-blade/assets/97832522/952ef119-c8bf-4693-babf-e3f503163cab)

教案・教材は、検索フォームからキーワード、学習者レベル、使用テキストに絞り込み検索することができます。
![search_record](https://github.com/yuyamh/datemaki-blade/assets/97832522/b4b1a728-943a-4337-a9c1-dca2f7875ed6)


### 投稿詳細画面
気になる投稿の内容が詳しく見られます。<br>
ここでファイルのダウンロード・教案のブックマークが可能です。
![show](https://github.com/yuyamh/datemaki-blade/assets/97832522/e3c1d537-65ef-4092-b425-8f4c3da8d759)

### 投稿作成・編集画面
投稿の作成・編集ができます（教案ファイルの添付は任意）。<br>
概要はマークダウン記法にも対応しています。
![create&edit](https://github.com/yuyamh/datemaki-blade/assets/97832522/083459cb-618c-48da-b6e4-e7a60f823cc8)

### マイページ
アカウント情報の確認ができます。<br>
ここでアカウント設定の変更・削除が可能です。
![profile](https://github.com/yuyamh/datemaki-blade/assets/97832522/7d5fab1b-8dcf-4b7d-9adb-52c63fae9564)

<br>

# ⭐️ アプリの機能一覧
## メイン機能
 - 教案投稿機能（CRUD）
 - AWS S3を用いたファイルアップロード機能（ファイル形式 : pdf, docx, zip, xlsx, jpeg, jpg, png）
 - ページネーション機能
 - ブックマーク登録・一覧機能
 - 教案検索機能（キーワード、学習者レベル、使用テキスト）
 - ユーザー検索機能（キーワード）
 - PHPUnitテスト（CircleCI）
 - レスポンシブデザイン（スマホ版対応）

## 認証機能
 - 会員登録 / ログイン / ログアウト
 - ゲストログイン
 - パスワード変更（ログイン中）
 - パスワードリセット（非ログイン）
 - アカウント情報編集（アイコン、名前、メールアドレス）
 - アカウント削除

 <br>

# ⭐️ 使用技術

### フロントエンド
- HTML / CSS / Tailwind CSS
- JavaScript

### バックエンド
- PHP 8.2.5
- Laravel 9.52.7
- MySQL 8.0.32
- Composer 2.5.5
- PHPUnit 9.6.7
- Node.js 16.20.0 / npm 9.6.6

### インフラ

- Docker 23.0.5 / docker-compose 1.29.2（開発環境）
- AWS (EC2, ALB, ACM, S3, RDS, CloudFormation, Route53, VPC, EIP, IAM, CloudWatch)
- nginx 1.22.1
- CircleCI 2.1

### その他
- Git 2.39.0 / GitHub
- PHPMyAdmin
- Visual Studio Code
- iTerm2
- Notion
- draw.io
- Google Sheets
- Google Slides
- Google Document
- MacOS

<br>

# ⭐️ インフラ構成図
![Infra_diagram](https://github.com/yuyamh/datemaki-blade/assets/97832522/18b4f0eb-2188-4ead-ae7e-1190c6d5277f)

<br>

# ⭐️ ER図
![ER_diagram](https://github.com/yuyamh/datemaki-blade/assets/97832522/c84f3125-f89c-4f4c-8f1b-87901a8a14d7)

<br>

# ⭐️ テーブル定義書
概要レベルのER図を元に、テーブル定義書を作成しました。

postsテーブル
![posts_table](https://github.com/yuyamh/datemaki-blade/assets/97832522/20dfbe06-71bb-4b9f-a8ef-afb0544b676d)

textsテーブル
![texts_table](https://github.com/yuyamh/datemaki-blade/assets/97832522/df54759f-7083-482e-8ec2-73da7f694289)

bookmarksテーブル
![bookmarks_table](https://github.com/yuyamh/datemaki-blade/assets/97832522/77b0b72e-0aca-4973-aee4-9d6a469f57bf)

usersテーブル
![users_table](https://github.com/yuyamh/datemaki-blade/assets/97832522/ef7bf6dc-c2ac-4d09-831c-c29a9d8ed249)

<br>

# ⭐️ URL設計書
![URL](https://github.com/yuyamh/datemaki-blade/assets/97832522/1381240c-16bc-4492-92d5-e0202bcae1fb)

![URL](https://github.com/yuyamh/datemaki-blade/assets/97832522/ff68d148-17cc-4888-9fd0-b82cd6a6b22e)

<br>

# ⭐️ 工夫したところ
 - アクセサを用いた、開発環境と本番環境におけるアップロードファイルのパスの統一化。
 - AWS S3へのファイルアップロード・削除。
 - PHPUnitを取り入れたバグの検知。
 - ゲストログインの実装。

<br>

# ⭐️ 苦労したところ
 - UI/UXの調整（Tailwind CSS）
 - FormRequestクラスを用いたバリデーションの実装
 - S3からのオブジェクト保存・取得・削除
 - AWS + CircleCIでの自動テスト・デプロイ


<br>

## 開発者
Yuya.Mansur.H<br>
Twitter：https://twitter.com/Mnsr_3
