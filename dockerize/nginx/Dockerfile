FROM tutum/nginx
COPY fastcgi-php.conf /etc/nginx/snippets/
RUN rm -rf /etc/nginx/sites-enabled
ADD sites-enabled/ /etc/nginx/sites-enabled

