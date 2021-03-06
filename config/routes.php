<?php

use App\Action\DeleteTaskAction;
use App\Action\ListActiveTaskAction;
use App\Action\ListArchivedTaskAction;
use App\Action\TaskChangeStatusAction;
use App\Action\TaskCreateAction;
use Slim\App;

return static function (App $app) {
    $app->get('/tasks', ListActiveTaskAction::class);
    $app->get('/tasks/archived', ListArchivedTaskAction::class);
    $app->post('/task/add', TaskCreateAction::class);
    $app->delete('/task/{id}/delete', DeleteTaskAction::class);
    $app->put('/task/{id}/status/archived', TaskChangeStatusAction::class);
};
