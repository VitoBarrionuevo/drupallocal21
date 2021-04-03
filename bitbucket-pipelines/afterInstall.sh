#!/bin/bash

if [ "$DEPLOYMENT_GROUP_NAME" == "gcom-nyc-dot" ]; then
	ENV_NAME=""
fi
if [ "$DEPLOYMENT_GROUP_NAME" == "gcom-nyc-dot_dev" ]; then
	ENV_NAME="-dev"
fi

rm -rf /var/www/html/gcom${ENV_NAME}
mv /var/www/html/deploy /var/www/html/gcom${ENV_NAME}
cd /var/www/html/gcom${ENV_NAME}
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --1
php -r "unlink('composer-setup.php');"
wget https://github.com/drush-ops/drush/releases/download/8.4.6/drush.phar
chmod 0775 drush.phar
php composer.phar install
mkdir web/sites/default/files/
chmod 0775 web/sites/default/files/
mv bitbucket-pipelines/settings.php web/sites/default/
chown -R ec2-user:apache /var/www/html/gcom${ENV_NAME}
php drush.phar cr
php drush.phar entup -y
php drush.phar updb -y
