# php54/Dockerfile
FROM php:5.4-apache

# 必要なPHP拡張をインストール
RUN docker-php-ext-install mysql

# カスタムphp.iniをコピー
COPY php.ini /usr/local/etc/php/

# 作業ディレクトリを設定
WORKDIR /var/www/html
