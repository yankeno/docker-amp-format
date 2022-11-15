FROM php:7.2-apache

# www 以下にディレクトリ名を指定
ENV APACHE_DOCUMENT_ROOT=/var/www/exercise-app

# 設定ファイル内のドキュメントルート名を置換
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && \
  apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get -y install vim && \
  pecl install xdebug && \
  docker-php-ext-enable xdebug && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install pdo_mysql

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR '/var/www/${APACHE_DOCUMENT_ROOT}'
