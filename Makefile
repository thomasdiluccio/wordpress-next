phpstan:
	./vendor/bin/phpstan
.PHONY: phpstan

pint:
	./vendor/bin/pint ./wordpress/wp-content/themes/my-theme
.PHONY: pint

update-cli:
	./wordpress/wp cli update
.PHONY: update-cli

update-wp:
	composer update
.PHONY: update-wp

update: update-cli update-wp
.PHONY: update