init:
	@make set_up
	@make up_d

set_up:
	cp .docker/.env.local .env
	cp php/.env.local php/.env
	@make key_generate

key_generate:
	docker-compose run --rm php php artisan key:generate --ansi

migrate:
	docker-compose run --rm php php artisan migrate

up_d:
	docker-compose up -d

up:
	docker-compose up
