FROM php:8.1-fpm-buster

# コンテナ内のサーバー環境変数を設定
ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY ./php.ini /usr/local/etc/php/php.ini

# composerのインストール
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# node.jsのインストール
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

# Laravelのインストールに必要なパッケージをインストール
RUN apt-get update && \
  apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath

# WORKDIR が存在しないときは生成
WORKDIR /var/www/html