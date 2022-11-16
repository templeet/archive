FROM php:7.0-apache

ENV TZ="Europe/Paris"

RUN apt-get update && apt-get install -y \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        locales \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Set the locale
RUN sed -i '/fr_FR.UTF-8/s/^# //g' /etc/locale.gen && locale-gen
ENV LANG fr_FR.UTF-8
ENV LANGUAGE fr_FR:fr
ENV LC_ALL fr_FR.UTF-8

RUN sed -i 's!;date.timezone =!date.timezone = "Europe/Paris"!g' "$PHP_INI_DIR/php.ini-development"
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN a2enmod rewrite
