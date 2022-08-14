FROM php:7.2-apache
COPY news.conf /etc/apache2/sites-available/news.conf
RUN docker-php-ext-install mysqli
RUN apt-get --yes update
RUN chmod 777 /var/www/html
RUN echo "ServerName localhost" >> /etc/apache2/news.conf &&
    a2enmod rewrite &&
    a2dissite 000-default &&
    a2ensite news &&
    service apache2 restart
RUN apt-get -qq --yes install vim
RUN apt-get -qq install nano

EXPOSE 80/tcp
EXPOSE 3000/tcp

