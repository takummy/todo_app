FROM php:7.3-fpm

COPY install-composer.sh /
RUN apt-get update && \
    apt-get install -y \
                   git \
                   libzip-dev \
                   unzip \
                   wget \
                   zip \
                   zlib1g-dev && \
    : 'Install PHP Extensions' && \
    docker-php-ext-install -j$(nproc) \
                           pdo_mysql && \
    : 'Install Composer' && \
    chmod 755 /install-composer.sh && \
    /install-composer.sh && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html/todo_app
