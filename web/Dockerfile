FROM php:5.4.45-apache

# 古いDebianリポジトリを使用して、パッケージが取得できるようにする
RUN echo "deb http://archive.debian.org/debian/ stretch main" > /etc/apt/sources.list \
    && echo "deb http://archive.debian.org/debian-security stretch/updates main" >> /etc/apt/sources.list \
    && apt-get update

# 必要なパッケージをインストール
RUN apt-get install -y --force-yes vim \
    && echo '* libraries/restart-without-asking boolean true' | debconf-set-selections \
    && apt-get install -y --force-yes htop \
    && apt-get install -y --force-yes libpq-dev \
    && apt-get install -y --force-yes libonig-dev

# PHP 拡張機能のインストール
RUN docker-php-ext-install mbstring mysql

# Apache の設定を修正
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
  && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
  && sed -ri -e 's!/var/www!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# カスタムのphp.iniをコピー
COPY ./php.ini /usr/local/etc/php/php.ini

# Apache をフォアグラウンドで実行
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
