#!/usr/bin/env bash

# Update package repository
apt update
apt update --fix-missing

# Install PHP packages
apt -y install php7.0 php7.0-cli php7.0-common php7.0-fpm php7.0-json php7.0-mysql php7.0-opcache php7.0-readline php7.0-xml

# Install Apache
apt -y install apache2 libapache2-mod-php7.0

# Install MySQL
apt -y install debconf-utils
debconf-set-selections <<< "mysql-server mysql-server/root_password password password"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password password"
apt -y install mysql-server

# Configure Apache
rm -rf /var/www/html
rm /etc/apache2/sites-available/*
rm /etc/apache2/sites-enabled/*
cp /var/www/skiutah/devops/apache_site.conf /etc/apache2/sites-available/default.conf
ln -s /etc/apache2/sites-available/default.conf /etc/apache2/sites-enabled/default.conf
a2enmod rewrite
service apache2 restart