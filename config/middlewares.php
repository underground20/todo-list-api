<?php

use Slim\App;
use App\Middleware\RequestAttribute;
use App\Middleware\ExceptionHandler;

return static function (App $app) {
    $settings = $app->getContainer()->get('settings');
    $app->add(RequestAttribute::class);
    $app->addBodyParsingMiddleware();
    $app->addRoutingMiddleware();

    $devMode = getenv('DEV_MODE');
    if ($devMode === true) {
        $app->addErrorMiddleware(
            $settings['displayErrorDetails'],
            $settings['logErrors'],
            $settings['logErrorDetails']
        );
    } else {
        $app->add(ExceptionHandler::class);
    }
};