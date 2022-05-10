.PHONY: up stop down install start restart reset

include .env
export $(shell sed 's/=.*//' .env)

# Variable target to create and correctly set user ownership of the directories used in tests.
WP_DIR = ./var/www/wp-file-manager-solid.local
$(WP_DIR): %:
	if [ ! -d "$@/wp-content" ]; then mkdir -p "$@/wp-content"; fi
	if [ ! -d "$@/wp-content/plugins" ]; then mkdir -p "$@/wp-content/plugins"; fi

# Variable target to create and correctly set user ownership of the directories used to scaffold the test installations.
INSTALL_DIRS = ./var/www/tests/xdebug_profiles ./var/www/install .cache/wp-cli
$(INSTALL_DIRS): %:
	if [ ! -d "$@" ]; then mkdir -p "$@"; fi
	test -d $@

setup_dirs: $(WP_DIR) $(INSTALL_DIRS)

up: setup_dirs
	#make setup_dirs
	docker compose up -d

stop:
	docker compose stop

down:
	docker compose down

# By default, docker-compose commands will use the `docker-compose.yml` configuration file.
DOCKER_COMPOSE_FILE=docker-compose.yml

install: docker-compose.yml ## Sets up the contents of the ./var/www directory.
	docker compose -f "$(DOCKER_COMPOSE_FILE)" exec -T php bash -c "/var/www/install/install"

#install_db: docker-compose.yml ## Sets up the contents of the ./var/www directory.
#	docker compose -f "$(DOCKER_COMPOSE_FILE)" exec -T database bash -c "/var/www/install/importdump"

destroy:
	docker compose -f "$(DOCKER_COMPOSE_FILE)" down --volumes
	docker compose -f "$(DOCKER_COMPOSE_FILE)" stop
	sudo rm -rf ./var/www/

enter: docker-compose.yml ## Opens a bash shell in the running `php-fpm` container.
	docker compose -f "$(DOCKER_COMPOSE_FILE)" exec php bash
.PHONY: enter

enter_db: docker-compose.yml ## Opens a bash shell in the running `php-fpm` container.
	docker compose -f "$(DOCKER_COMPOSE_FILE)" exec database bash
.PHONY: enter_db

npm:
	(cd src && npm i)
.PHONY: npm

css:
	(cd src && npm run css)
.PHONY: css

js:
	(cd src && npm run js)
.PHONY: js

assets:
	(cd src && npm run dist)
.PHONY: assets

watch:
	(cd src && npm run watch)
.PHONY: watch
