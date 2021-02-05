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