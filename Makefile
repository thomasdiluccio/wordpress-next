phpstan:
	./vendor/bin/phpstan
.PHONY: phpstan

pint:
	./vendor/bin/pint ./src/lemonade
.PHONY: pint

get-composer:
	./src/get-composer.sh
.PHONY: get-composer

update-cli:
	./wordpress/wp cli update
.PHONY: update-cli

update-wp:
	composer update
.PHONY: update-wp

update: update-cli update-wp get-composer
.PHONY: update