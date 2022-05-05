FROM php:7.2-apache
RUN docker-php-ext-install mysqli
RUN apt-get --yes update
RUN apt-get -qq --yes install vim
RUN apt-get -qq install nano
RUN chmod 777 /var/www/html



