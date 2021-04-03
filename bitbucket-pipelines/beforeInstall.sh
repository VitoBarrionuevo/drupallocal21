#!/bin/bash

if [ -d "/var/www/html/deploy" ]; then
	exit 1
else
	mkdir /var/www/html/deploy
fi
