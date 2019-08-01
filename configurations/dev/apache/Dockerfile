FROM php:7.2-apache

RUN apt-get update -qy && \
    apt-get install -qy nano \
        apt-utils \
        iputils-ping \
        locate \
        iproute2 \
        curl \
        wget \
        pdftk \
        libmcrypt-dev \
        imagemagick \
        libzip-dev \
        zip \
        libpng-dev \
        libjpeg-dev && \
    docker-php-ext-configure zip --with-libzip --with-jpeg-dir=/usr/lib && \
    docker-php-ext-install mysqli pdo pdo_mysql zip gd && \
    pecl install channel://pecl.php.net/xdebug-2.6.0 && \
    wget https://getcomposer.org/composer.phar -O /tmp/composer && \
    mv /tmp/composer /usr/local/bin/composer && \
    mkdir -p /var/www/html/data/child-updates

COPY ./httpd.conf /etc/apache2/apache2.conf
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./xdebug-fix.sh /tmp/xdebug-fix.sh
COPY ./wait-for-it.sh /usr/local/bin/wait-for-it.sh
COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh
COPY ./provision-custard.sh /usr/local/bin/provision-custard.sh

RUN chmod a+x /tmp/xdebug-fix.sh && \
    /tmp/xdebug-fix.sh && \
    rm /tmp/xdebug-fix.sh && \
    touch /var/log/remote.log && \
    a2enmod rewrite && \
    chmod 777 /var/log/remote.log && \
    chmod a+x /usr/local/bin/entrypoint.sh && \
    chmod a+x /usr/local/bin/wait-for-it.sh && \
    chmod a+x /usr/local/bin/provision-custard.sh && \
    chown -R www-data:www-data /var/www/html/ && \
    mkdir /var/lib/php && \
    mkdir /var/lib/php/session && \
    chown -R www-data:www-data /var/lib/php

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD []
