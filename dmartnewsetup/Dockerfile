
WORKDIR /var/www/html

COPY . /var/www/html/

RUN ls -la /var/www/html/ && \
    test -f /var/www/html/index.php

RUN chown -R www-data:www-data /var/www/html/ \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;
