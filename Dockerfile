FROM php:8.3-apache

# Activer mod_rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY ./www/.htaccess /var/www/html/

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf