<?php

use App\Action\TaskCreateAction;
use Slim\App;

return static function (App $app) {
    $app->get('/tasks', \App\Action\ListActiveTaskAction::class);
};
