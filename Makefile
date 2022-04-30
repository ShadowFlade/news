make-news:
	docker-compose exec -T db mysql -uroot -pexample news < ./news.sql
run-news:
	docker-compose up
