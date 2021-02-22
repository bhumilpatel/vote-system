#!/usr/bin/env bash
set -e

source .env

if [ -z "$APP_KEY" ]; then
    echo "No application key found, setting and then exiting. Please start again.";
    php artisan key:generate
    exit 1;
fi

if [ "$1" == "artisan" ]; then
    exec docker-php-entrypoint php "$@"
fi

if [ "$1" != "apache2-foreground" ]; then
    exec docker-php-entrypoint "$@"
fi

php artisan config:cache
php artisan migrate --force --seed

php artisan votesystem:admin

exec docker-php-entrypoint "$@"
