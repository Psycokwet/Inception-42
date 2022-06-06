# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: scarboni <scarboni@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2022/06/06 20:15:49 by scarboni          #+#    #+#              #
#    Updated: 2022/06/06 21:20:01 by scarboni         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = inception

all: fclean re
$(NAME): all
	
down:
	docker-compose -f srcs/docker-compose.yml down

up:
	docker-compose -f srcs/docker-compose.yml up

clean: down
	docker stop $$(sudo docker ps -qa)
	docker rm $$(docker ps -qa)
	docker rmi -f $$(docker images -qa)
	docker volume rm $$(docker volume ls -q)
	docker network rm $$(docker network ls -q)

define tester_sep
	@printf "\n____.--.--.____.--.--.____.--.--.____.--.--.__** $(1) **__.--.--.____.--.--.____.--.--.____.--.--.____\n" ;\
	$(1)
endef

info: 
	$(call tester_sep,docker ps -a)
	$(call tester_sep,docker images -a)
	$(call tester_sep,docker volume ls)
	$(call tester_sep,docker network ls)

fclean: clean
	docker system prune -fa

re: 
	docker-compose -f srcs/docker-compose.yml up --build

.PHONY: linux stop clean prune reload all info
