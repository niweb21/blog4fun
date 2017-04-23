Blog4Fun
========================

A personnal personnal project just for fun

What's inside?
--------------

A small blog motor:

  * Edit and publish markdown content



Technologies
--------------

* Symfony 3.2

* PHP7

* MongoDB 3.4



TODO
--------------

[x] Dockerize the environment
[ ] Clean up useless Symfony dependencies
[ ] Add MongoDb support
[ ] Init tests
[ ] Add front routes
[ ] Add Backend routes
[ ] Add templates



Docker
--------------

### Lunch the containers
docker-compose up -d

### Down and rebuild
docker-compose down && docker-compose rm && docker-compose build

### Connect
docker exec -it blog4fun_web_1 /bin/bash
docker exec -it blog4fun_db_1 /bin/bash
