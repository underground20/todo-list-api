<?php

namespace App\Action;

use App\Repository\TaskRepository;

use InvalidArgumentException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TaskCreateAction implements RequestHandlerInterface
{
    private TaskRepository $repo;

    public function __construct(TaskRepository $repo)
    {
        $this->repo = $repo;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $param = $request->getParsedBody();
        if ($text = $param['text']) {
            $id = $this->repo->addTask($text);
            return new JsonResponse("Task $id add");
        }
        throw new InvalidArgumentException('Miss required parameter text', 404);
    }
}