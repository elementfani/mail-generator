FROM phpdockerio/php:8.0-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.0-mysql \
    php8.0-xdebug

COPY 20-xdebug.ini /etc/php/8.0/fpm/conf.d/

RUN usermod -u 1000 www-data

WORKDIR "/var/www/html"

EXPOSE 9000
