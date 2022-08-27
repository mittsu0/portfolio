FROM php:8.0-fpm-buster

WORKDIR /var/www/html

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

# node.jsのインストール
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get update && apt-get install -y nodejs

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  mkdir /var/run/php-fpm && \
  docker-php-ext-install intl pdo_mysql zip bcmath && \
  composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.org

COPY ./docker/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# RUN composer install -q -n --no-ansi --no-dev --no-scripts --no-progress --prefer-dist \
#   && chown -R www-data:www-data ./ \
#   && chmod -R 777 storage bootstrap/cache \
#   && php artisan optimize:clear \
#   && php artisan optimize \
#   && php artisan cache:clear \
#   && php artisan config:clear \
#   && php artisan route:clear \
#   && php artisan view:clear \