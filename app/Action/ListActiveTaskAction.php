<?php

namespace App\Action;

use App\Service\SerializeService;
use App\Service\TaskService;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListActiveTaskAction implements RequestHandlerInterface
{
    private TaskService $taskService;
    private SerializeService $serializer;

    public function __construct(TaskService $service, SerializeService $serializer)
    {
        $this->taskService = $service;
        $this->serializer = $serializer;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $tasks = $this->taskService->getActive();
        $tasksJson = $this->serializer->serialize($tasks);
        $response = new Response();
        $response->getBody()->write($tasksJson);
        return $response
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/json');
    }
}