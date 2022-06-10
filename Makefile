# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: scarboni <scarboni@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2022/06/06 20:15:49 by scarboni          #+#    #+#              #
#    Updated: 2022/06/10 14:58:39 by scarboni         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

include ./srcs/.env
NAME = inception

all: fclean re
$(NAME): all

#https://stackoverflow.com/questions/2214575/passing-arguments-to-make-run
ifeq (cmd_in_doc,$(firstword $(MAKECMDGOALS)))
  # use the rest as arguments for "run"
  RUN_ARGS := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
  # ...and turn them into do-nothing targets
  $(eval $(RUN_ARGS):;@:)
endif

init:
	sudo service nginx stop

cmd_in_doc:
	sudo docker exec -it $(RUN_ARGS)
	
down:
	docker-compose -f srcs/docker-compose.yml down

up:
	docker-compose -f srcs/docker-compose.yml up


define tester_sep
	@printf "\n____.--.--.____.--.--.____.--.--.____.--.--.__** $(1) **__.--.--.____.--.--.____.--.--.____.--.--.____\n" ;\
	$(1)
endef

info: 
	$(call tester_sep,docker ps -a)
	$(call tester_sep,docker images -a)
	$(call tester_sep,docker volume ls)
	$(call tester_sep,docker network ls)

clean:
	sudo docker stop $$(sudo docker ps -qa) || true
	docker rm $$(docker ps -qa) || true
	docker rmi -f $$(docker images -qa) || true
	docker volume rm $$(docker volume ls -q) || true
	docker network rm $$(docker network ls -q) || true

clean_data: 
	sudo rm -rf $(DATA_FOLDER)
	
fclean: clean clean_data
	docker system prune -fa

re: 
	docker-compose -f srcs/docker-compose.yml up --build

.PHONY: linux stop clean prune reload all info
