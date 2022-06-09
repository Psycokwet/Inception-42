#must contain nginx only

# OS
FROM debian:buster
# FROM alpine:3.15

# ESSENTIALS
# same cache, so must be run in the same RUN
# RUN apk update && \
# 	apk upgrade && \
# 	apk add nginx openssl

RUN apt-get update && \
	apt-get upgrade && \
	apt-get install -yq nginx openssl


RUN mkdir -pv /var/www/my_super_site /etc/nginx/conf.d/ /etc/ssl/private/

# # installing non auto index
# RUN mv /var/www/html/index.nginx-debian.html /var/www/my_super_site

# Giving exec rights to user www-data
# RUN chown -R www-data /var/www/*
# RUN chmod -R 755 /var/www/*

COPY conf/ssl.conf /etc/nginx/conf.d/ssl.conf
COPY conf/http.conf /etc/nginx/conf.d/http.conf
COPY conf/index.html  /var/www/my_super_site/index.html
RUN rm -rf /var/www/html /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# SSL configuration
RUN openssl req -new -newkey rsa:2048 -nodes \
     -out /etc/ssl/certs/my_super_site.csr \
     -keyout /etc/ssl/private/my_super_site.key \
     -subj "/C=DE/ST=0/L=0/O=0/CN=my_super_site"
RUN openssl x509 -req -in /etc/ssl/certs/my_super_site.csr -signkey /etc/ssl/private/my_super_site.key -out /etc/ssl/certs/my_super_site.crt

WORKDIR /root

# COPY conf/start.sh /root/start.sh

# Start initialization script

# # Start initialization script
# # [,] exec form for perfs
# # ENTRYPOINT because CMD can be overrided, and we don't want it. Well, entrypoint can too, but less easily
# ENTRYPOINT [ /root/start.sh ]

# ENTRYPOINT ["nginx", "-g", "daemon off;"]
RUN nginx -t
EXPOSE 80
STOPSIGNAL SIGQUIT
ENTRYPOINT ["nginx", "-g", "daemon off;"]