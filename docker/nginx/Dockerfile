FROM nginx:1.22

WORKDIR /var/www/html

ENV TZ=UTC

COPY ./docker/nginx/*.conf /etc/nginx/conf.d/
COPY ./src /var/www/html/