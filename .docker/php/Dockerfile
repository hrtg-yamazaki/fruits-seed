FROM php:7.4-fpm

ENV LANG C.UTF-8

RUN mkdir /php
COPY ./php /php/
WORKDIR /php

RUN apt-get update \
    && apt-get install -y libzip-dev zlib1g-dev mariadb-client \
    && docker-php-ext-install zip pdo_mysql

COPY --from=composer:1.10.13 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV PATH $PATH:/usr/bin/composer/vendor/bin

RUN composer install
