
FROM php:8.2-apache

# Install PHP extensions for MySQL
RUN docker-php-ext-install mysqli pdo_mysql

# Set website directory
WORKDIR /var/www/html

# Copy project files into Apache web root
COPY . /var/www/html/

# Show copied files and locate index.php
RUN echo "===== WEBSITE ROOT =====" \
    && ls -la /var/www/html/ \
    && echo "===== INDEX FILE SEARCH =====" \
    && find /var/www/html -maxdepth 5 -type f -iname 'index.php'

# Set normal file and directory permissions
RUN chown -R www-data:www-data /var/www/html/ \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Enable Apache URL rewriting
RUN a2enmod rewrite

# Render web service port
EXPOSE 80
