FROM php:8.1.1-apache
RUN a2enmod rewrite && docker-php-ext-install pdo pdo_mysql
COPY --from=composer/composer /usr/bin/composer /usr/bin/composer


