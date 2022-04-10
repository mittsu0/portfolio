FROM php:8.1-fpm-buster

# コンテナ内のサーバー環境変数を設定
ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# Laravelのインストールに必要なパッケージをインストール
# -y 問い合わせがあった場合はすべて「y」
# --no-install-recommends 不要なパッケージのインストールを防止
# apt-get clean && rm -rf /var/lib/apt/lists/* パッケージインストールで使用したキャッシュファイルを削除
# phpの公式Dockerイメージには、docker-php-ext-install, docker-php-ext-enable, docker-php-ext-configure のPHP拡張ライブラリを簡単に利用するための便利コマンドが予め用意されている
RUN apt-get update && \
  apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath

COPY ./php.ini /usr/local/etc/php/php.ini

# WORKDIR が存在しないときは生成
WORKDIR /data