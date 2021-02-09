<?php

namespace App\Action;

use App\Service\TaskService;
use InvalidArgumentException;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TaskCreateAction implements RequestHandlerInterface
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $param = $request->getParsedBody();
        if ($text = $param['text']) {
            $id = $this->service->addTask($text);
            return new EmptyResponse(201);
        }
        throw new InvalidArgumentException('Miss required parameter text', 404);
    }
}