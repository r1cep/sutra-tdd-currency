FROM php:7.3.11-cli-alpine3.10

WORKDIR /home/www-data

RUN apk --update --no-cache add \
    tzdata \
    zip \
    unzip \
    git && \
    rm -rf /var/cache/apk/*

RUN  mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./php.ini  $PHP_INI_DIR/conf.d/

COPY --from=composer:1.9.0 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_HOME=/.composer
