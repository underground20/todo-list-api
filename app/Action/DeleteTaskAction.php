<?php

namespace App\Action;

use App\Service\TaskService;
use Laminas\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteTaskAction implements RequestHandlerInterface
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        $this->service->deleteTask($id);
        return new EmptyResponse(204);
    }
}