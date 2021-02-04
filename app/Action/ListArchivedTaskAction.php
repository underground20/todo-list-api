<?php

namespace App\Action;

use App\Repository\TaskRepository;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListArchivedTaskAction implements RequestHandlerInterface
{
    private TaskRepository $repo;

    public function __construct(TaskRepository $repo)
    {
        $this->repo = $repo;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $tasks = $this->repo->findArchivedTasks();
        return new JsonResponse($tasks, 200, [], JSON_PRETTY_PRINT);
    }
}