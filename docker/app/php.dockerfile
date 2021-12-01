FROM php:8.0.2-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache autoconf git g++ make
RUN apk update && apk add mysql-client

RUN docker-php-ext-install pdo pdo_mysql pcntl
