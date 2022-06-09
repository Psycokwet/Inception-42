#must contain mariadb only

# OS
FROM debian:buster

# ESSENTIALS
# same cache, so must be run in the same RUN
RUN apt-get update \
	apt-get upgrade \
	apt-get install mariadb-server \
	apt-get autoremove

WORKDIR /root

COPY conf/start.sh /root/start.sh

# Start initialization script
# [,] exec form for perfs
# ENTRYPOINT because CMD can be overrided, and we don't want it. Well, entrypoint can too, but less easily
ENTRYPOINT [ /root/start.sh ]
