FROM php:apache
WORKDIR /var/www/html
RUN apt-get update && apt-get --assume-yes install zip
RUN echo "serverName localhost" >> /etc/apache2/apache2.conf
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
php -r "unlink('composer-setup.php');"
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN mkdir /var/www/html/public
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80
RUN a2enmod rewrite
RUN service apache2 restart
