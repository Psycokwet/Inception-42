#must contain WORDPRESS + php-fpm

# OS
FROM debian:buster

# ESSENTIALS
# same cache, so must be run in the same RUN
RUN apt-get update && \
	apt-get upgrade && \
	apt-get install -yq wget && \
	apt-get install -yq php php-fpm php-mysq && \
	apt-get install -yq php-mbstring && \
	apt-get install -yq php-zip && \
	apt-get install -yq php-gd 

WORKDIR /root

# PHP MY ADMIN

RUN mkdir -p /var/www/wp
# RUN wp core download

# # Installing wordpress
RUN wget -c https://wordpress.org/latest.tar.gz && \
	tar -xvf latest.tar.gz && \
	mv wordpress/ /var/www/wp/ && \
	rm latest.tar.gz

# Moving wordpress configuration source file to proper destination
COPY conf/wp-config.php /var/www/wp

COPY conf/start.sh /root/start.sh

# Start initialization script
# [,] exec form for perfs
# ENTRYPOINT because CMD can be overrided, and we don't want it. Well, entrypoint can too, but less easily
ENTRYPOINT [ /root/start.sh ]
