
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /var/www/html

# Copy the project from the nested folder into Apache's root
COPY dmartnewsetup/ /var/www/html/

# Confirm homepage exists
RUN test -f /var/www/html/index.php \
    && echo "SUCCESS: index.php found in Apache root"

# Set permissions
RUN chown -R www-data:www-data /var/www/html/ \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

RUN a2enmod rewrite

EXPOSE 80
