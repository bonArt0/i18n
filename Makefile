PATH := $(shell pwd)/bin:$(PATH)

build:
	docker build -t free-elephants/i18n-dev .

install: build
	composer install

test:
	php -d xdebug.mode=coverage vendor/bin/phpunit

