FROM php:7.4-fpm

WORKDIR /var/www/html

COPY php.ini /usr/local/etc/php/php.ini
COPY www.conf-api /usr/local/etc/php-fpm.d/www.conf
RUN apt-get update && apt-get install -y libzip-dev unzip procps supervisor nano git
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
install-php-extensions pdo_mysql mysqli zip xlswriter pcntl curl mbstring gd xml xsl bz2 sqlite3 memcached redis bcmath intl json opcache mcrypt
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY docker-php-ext-opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

RUN git clone https://github.com/edenhill/librdkafka.git \
    && cd librdkafka \
    && ./configure \
    && make \
    && make install \
    && pecl install rdkafka \
    && docker-php-ext-enable rdkafka

RUN mkdir -p /var/log/php \
    && touch /var/log/php/fpm-access.log \
    && touch /var/log/php/fpm-error.log \
    && touch /var/log/php/fpm-slow.log \
    && chown -R www-data:www-data /var/log/php

COPY ../../ /var/www/html

EXPOSE 9000

CMD ["php-fpm"]
