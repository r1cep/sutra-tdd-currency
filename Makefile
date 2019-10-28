SHELL = bash
.ONESHELL:
.DEFAULT_GOAL := help

args := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))

$(eval $(args):;@:)

#########################################################################################

.PHONY: init
init: ## build docker container & setup packagist mirror repo & install plugin.
	@docker-compose build
	@docker-compose run --rm -u $$(id -u):$$(id -g) php composer config -g repositories.packagist composer https://packagist.jp
	@docker-compose run --rm -u $$(id -u):$$(id -g) php composer global require hirak/prestissimo

.PHONY: test
test: ## e.g.) docker-compose run --rm -u $(id -u):$(id -g) php ./vendor/bin/phpunit --testdox
	@docker-compose run --rm -u $$(id -u):$$(id -g) php ./vendor/bin/phpunit --testdox

.PHONY: composer
composer: ## e.g.) docker-compose run --rm -u $(id -u):$(id -g) php composer
	@docker-compose run --rm -u $$(id -u):$$(id -g) php composer $(args)

.PHONY: login
login: ## e.g.) docker-compose run --rm -u $(id -u):$(id -g) php ash
	@docker-compose run --rm -u $$(id -u):$$(id -g) php ash

#########################################################################################

export LOGO
.PHONY: help
help: ## display help
	@echo -e "$${LOGO}"
	@grep -h -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m  %-30s\033[0m %s\n", $$1, $$2}'

#########################################################################################

# @see http://patorjk.com/software/taag/#p=display&f=Slant&t=TDD%Currency
#      Font: Slant
define LOGO
\e[1;34m
  __________  ____     ______
 /_  __/ __ \/ __ \   / ____/_  _______________  ____  _______  __
  / / / / / / / / /  / /   / / / / ___/ ___/ _ \/ __ \/ ___/ / / /
 / / / /_/ / /_/ /  / /___/ /_/ / /  / /  /  __/ / / / /__/ /_/ /
/_/ /_____/_____/   \____/\__,_/_/  /_/   \___/_/ /_/\___/\__, /
                                                         /____/
\e[m\e[33mUsage:\e[m
  command [options] [arguments]

\e[33mAvailable Commands:\e[m
endef
