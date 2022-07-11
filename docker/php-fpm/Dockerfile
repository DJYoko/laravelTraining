FROM php:8.0-fpm-buster

LABEL maintainer="DJYoko"

WORKDIR /var/www/html

RUN apt-get update \
  && apt-get install -y \
  chromium \
  libzip-dev \
  lsb-release \
  gnupg \
  curl \
  ca-certificates \
  zip \
  unzip \
  git \
  libpng-dev \
  default-mysql-client \
  redis-tools \
  procps \
  gettext-base \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libicu-dev \
  && pecl install redis \
  && docker-php-ext-install zip \
  && docker-php-ext-enable redis \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) \
  pdo_mysql \
  intl \
  gd \
  bcmath \
  && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
  && apt-get update \
  && apt-get install -y nodejs \
  && npm install -g yarn \
  && apt-get -y autoremove \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
#  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
#  && pecl install xdebug \
#  && docker-php-ext-enable xdebug \
#  && echo "xdebug.mode=debug" >> "$PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini" \
#  && echo "xdebug.client_host = host.docker.internal" >> "$PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini" \
#  && echo "xdebug.idekey = PHPSTORM" >> "$PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini"

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY php.ini "$PHP_INI_DIR/conf.d/zz-override.ini"
