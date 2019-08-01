#!/usr/bin/env bash

updatedb

XDEBUG_PATH=$(locate xdebug.so)

sed -i "s%EXTENSION_LOCATION%${XDEBUG_PATH}%g" /usr/local/etc/php/conf.d/xdebug.ini