install:
	composer install

test:
	composer run-script test

lint:
	composer run-script phpcs -- --standard=PSR12 resources 

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 resourses

run:
	php -S localhost:8000 -t public

logs:
	tail -f storage/logs/lumen.log
	
