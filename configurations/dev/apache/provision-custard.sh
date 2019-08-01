#!/bin/bash

BIN_PATH="/var/www/html/bin"

# Initialise the data
${BIN_PATH}/custard stem:update-schemas
${BIN_PATH}/custard stem:seed-data