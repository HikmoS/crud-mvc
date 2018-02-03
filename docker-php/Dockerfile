FROM ubuntu:latest
RUN apt-get update
RUN apt-get install -y  php7.0-fpm php7.0-cli
RUN sed -i '/daemonize /c \
daemonize = no' /etc/php/7.0/fpm/php-fpm.conf
RUN sed -i '/^listen /c \
listen = 0.0.0.0:80' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/^listen.allowed_clients/;listen.allowed_clients/' /etc/php/7.0/fpm/pool.d/www.conf

RUN php -r "readfile('http://getcomposer.org/installer');" | php
RUN mkdir /run/php
RUN echo "< ?php phpinfo(); ? > " > /run/php/index.php
RUN apt-get remove -y
RUN apt-get clean
RUN rm -rf /var/list/apt/lists
ENV php_conf /etc/php/7.0/fpm/php.ini
EXPOSE 80
VOLUME /run/php
ENTRYPOINT ["php-fpm7.0"]

