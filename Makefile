install:
	composer install

test:
	composer run-script test

lint:
	composer run-script phpcs -- --standard=PSR12 app routes

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 app routes

run:
	php -S localhost:8000 -t public

logs:
	tail -f storage/logs/lumen.log

migrate:
	php artisan migrate:refresh
	
