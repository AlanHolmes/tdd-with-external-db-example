FROM php:7.1-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
        libcurl4-gnutls-dev \
        libsqlite3-0 \
        libxml2-dev \
        libmcrypt-dev \
        libicu-dev \
        curl \
        mysql-client \
        zip \
        git

## PHP Extensions
RUN docker-php-ext-install curl
RUN docker-php-ext-install json
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install mcrypt
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install xml
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
