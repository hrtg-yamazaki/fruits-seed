##### 実行コマンド一覧 #####
#
# init: 初回実行用
#
# up: サーバー実行
# up-a: サーバー実行(detachedモードOFF)
#
# stop: コンテナストップ
# down: コンテナdown
# down-rmi: コンテナdown + イメージ削除
#
# bash: phpコンテナにbashで入る
# bash-db: mysqlコンテナにbashで入る 
#
# migrate: マイグレーション
# key-generate: appキー生成
# 
# reset-app-force: アプリをDB含め最初から作り直す※取り扱い注意
#
# set-up: プロジェクトのセットアップ
# mysql-setup: mysqldbのセットアップ
# 

# sleep 2m を何とかしたい・・・
init:
	@make set-up
	@make up
	sleep 90
	@make migrate
	echo "Please try to access: http://localhost:8310/"

up:
	docker-compose up -d

up-a:
	docker-compose up

stop:
	docker-compose stop

down:
	docker-compose down

down-rmi:
	docker-compose down --rmi local

bash:
	docker exec -it fseed_php /bin/bash

bash-db:
	docker exec -it fseed_mysql /bin/bash

migrate:
	docker exec -it fseed_php php artisan migrate

key-generate:
	docker-compose run --rm php php artisan key:generate --ansi

reset-app-force:
	@make down-rmi
	rm -f .env ./php/.env
	rm -f -r mysql/data
	@make init

set-up:
	cp .docker/.env.local .env
	cp php/.env.local php/.env
	@make key-generate
