
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /var/www/html

COPY . /var/www/html/

RUN echo "=== Checking website files ===" \
    && ls -la /var/www/html/ \
    && test -f /var/www/html/index.php

RUN chown -R www-data:www-data /var/www/html/ \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

RUN a2enmod rewrite

EXPOSE 80
