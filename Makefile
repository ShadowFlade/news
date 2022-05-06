all: generate make-news
run-news:
	docker-compose up
make-news:
	docker-compose exec -T db mysql -uroot -pexample news < ./news.sql

