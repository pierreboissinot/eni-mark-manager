DOCKER_COMPOSE = docker-compose

RUN_PHP = php

SYMFONY         = $(RUN_PHP) bin/console
COMPOSER        = $(RUN_PHP) composer

##
## Project
## -------
##

start:
	${DOCKER_COMPOSE} up -d --remove-orphans --no-recreate

migrate: vendor
	${SYMFONY} doctrine:migrations:migrate --no-interaction --allow-no-migration

# rules based on files
composer.lock: composer.json
	$(COMPOSER) update --lock --no-scripts --no-interaction

vendor: composer.lock
	$(COMPOSER) install


.DEFAULT_GOAL := help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
