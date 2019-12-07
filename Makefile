.DEFAULT_GOAL := test

PHP_DOCKER_CONTAINER=php
DOCKER_COMPOSE_TEST=docker-compose -f docker-compose.test.yml -f docker-compose.yml

.PHONY: install
install:
	docker run --rm --volume $(CURDIR):/app composer install

.PHONY: start
start: stop install
	docker-compose up -d

.PHONY: stop
stop:
	$(DOCKER_COMPOSE_TEST) down --remove-orphans

.PHONY: test
test: start phpunit stop

.PHONY: phpunit
phpunit:
	$(DOCKER_COMPOSE_TEST) run --rm tester ./vendor/bin/phpunit --configuration ./phpunit.xml.dist --cache-result-file=/tmp/.phpunit.result.cache
