FROM php:8.1-apache
# Install node
# RUN curl -sL https://deb.nodesource.com/setup_10.x | bash
# RUN apt-get install --yes nodejs

# Enable apache rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Allow rewrites for .htaccess, NOT SURE I NEED THE ADD COMMAND HERE:
RUN a2enmod rewrite
ADD . /var/www/html 

# INSTALL NANO if I need to edit files in bash
# RUN apt-get install nano

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y