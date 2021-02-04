<?php

use App\Action\ListActiveTaskAction;
use App\Action\ListArchivedTaskAction;
use Slim\App;

return static function (App $app) {
    $app->get('/tasks', ListActiveTaskAction::class);
    $app->get('/tasks/archived', ListArchivedTaskAction::class);
};
