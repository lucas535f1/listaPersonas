FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql
RUN echo "extension=pdo_mysql.so" >> /usr/local/etc/php/conf.d/40-pdo_mysql.ini

COPY . /var/www/html/

EXPOSE 80
