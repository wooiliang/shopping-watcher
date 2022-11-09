FROM php:8-cli

RUN apt-get update && \
    apt-get install -y git zip unzip

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY php.ini /usr/local/etc/php/conf.d/

WORKDIR /app
COPY . .

RUN composer install