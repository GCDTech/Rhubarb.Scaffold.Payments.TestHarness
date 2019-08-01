#!/bin/bash

echo "Waiting for DB"
/usr/local/bin/wait-for-it.sh -t 30 db:3306 -- echo "DB READY"

if [[ ! -d /var/www/html/deployed ]]; then
    mkdir -p /var/www/html/deployed
fi

chown -R www-data:www-data /var/www/html/deployed

docker-php-entrypoint apache2-foreground