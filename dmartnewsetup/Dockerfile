
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /var/www/html

COPY . /var/www/html/

RUN echo "=== WEBSITE ROOT ===" \
    && ls -la /var/www/html/ \
    && test -f /var/www/html/index.php

RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
