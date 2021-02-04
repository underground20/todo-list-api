<?php

namespace App\Action;

use App\Repository\TaskRepository;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TaskChangeStatusAction implements RequestHandlerInterface
{
    private TaskRepository $repo;

    public function __construct(TaskRepository $repo)
    {
        $this->repo = $repo;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        $status = $this->repo->changeStatusOnDone($id);
        return new JsonResponse("Task $id, change status on archived ");
    }
}