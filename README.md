# laravel practice

## ダウンロード方法

git clone
git clone https://github.com/ryusei0709/event_reserve.git

git clone ブランチうぃ指定してダウンロードする場合

git clone -b ブランチ名 https://github.com/ryusei0709/event_reserve.git

またはzipファイルでダウンロードして下さい

## インストール方法

- cd events_reserve
- composer install
- npm install
- npm run dev

.env.example をコピーして.envファイルを作成する必要があります。

.envファイルの中の下記をご利用の環境に合わせて変更して下さい。

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=event_resrve_docker
DB_USERNAME=root
DB_PASSWORD=root

XAMPP/MAMP または他の開発環境でDBを起動した後に、

php artisan migrate:fresh --seed

を実行して下さい(データベーステーブルとダミーデータが追加されればOK)

php artisan serve
で簡易サーバーを立ち上げ、表示確認をしてください。

画像のリンク
php artisan storage:link

プロフィールページで画像アップロード機能を使う場合は
.envのAPP_URLを下記に変更して下さい

# APP_URL=http://localhost
APP_URL=http://127.0.0.1:8000

TailWindcss 3.xのJustInTime機能により、
使ったHTML内のクラスのみ反映されるようになっていますので、
HTMLを編集する際は、
npm run watch も実行しながら編集するようにしてください。

