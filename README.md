# Todo list api

Using [Slim 4 Framework](https://github.com/slimphp/Slim) and docker (docker-compose) for create app.

# Routes
### View tasks
* [Show active tasks](tasks/get.md) : `GET /tasks`
* [Show archived task](tasks/archived/get.md) : `GET /tasks/archived`

### Change task
* [Create new task](tasks/add/post.md) : `POST /tasks/add`
* [Change status on done](task/id/status/archived/put.md) : `PUT /task/id/status/archived`
* [Delete task by id](task/id/delete/delete.md) : `DELETE /task/id/delete`

### Run app
1. Clone project:
```sh
$ git clone https://github.com/underground20/todo-list-api.git .
```
2. Create environment with docker-compose:
```sh
$ docker-compose up -d
```
3. Install packages with composer:
```sh
$ docker-compose exec php-fpm composer install
```
4. Create database schema:
```sh
$ docker-compose exec php-fpm vendor/bin/doctrine orm:schema-tool:create
```
