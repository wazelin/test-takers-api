.DEFAULT_GOAL := ci

DOCKER_COMPOSE_TEST=docker-compose -f docker-compose.yml -f docker-compose.test.yml

.PHONY: install
install:
	docker run --rm --volume $(CURDIR):/app composer install

.PHONY: start
start: stop install
	docker-compose up -d --build

.PHONY: stop
stop:
	$(DOCKER_COMPOSE_TEST) down --remove-orphans

.PHONY: ci
ci: start test stop

.PHONY: prepare-test
prepare-test:
	$(DOCKER_COMPOSE_TEST) run --rm tester ./vendor/bin/codecept build

.PHONY: test
test: prepare-test
	$(DOCKER_COMPOSE_TEST) run --rm tester ./vendor/bin/codecept run
