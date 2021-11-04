#! /bin/bash

composer install
curl -s https://getcomposer.org/installer | php
composer dump-autoload

sudo nano /etc/apache2/sites-available/market.local.conf
echo "127.0.0.1      market.local" >> /etc/hosts

sudo a2ensite enable market.local.conf
sudo a2enmod rewrite
sudo service apache2 reload