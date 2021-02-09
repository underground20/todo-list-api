<?php

namespace App\Action;

use App\Service\TaskService;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListActiveTaskAction implements RequestHandlerInterface
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $tasks = $this->service->getActive();
        return new JsonResponse($tasks, 200, [], JSON_PRETTY_PRINT);
    }
}