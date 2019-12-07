FROM php:7.4-fpm
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY configuration/* /usr/local/etc/php/conf.d/
