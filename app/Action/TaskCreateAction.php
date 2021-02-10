<?php

namespace App\Action;

use App\Service\TaskService;
use App\Service\ValidatorService;
use App\Validator\TextLengthConstraint;
use InvalidArgumentException;
use Laminas\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TaskCreateAction implements RequestHandlerInterface
{
    private TaskService $service;
    private ValidatorService $validator;

    public function __construct(TaskService $service, ValidatorService $validator)
    {
        $this->service = $service;
        $this->validator = $validator;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws InvalidArgumentException if miss required parameter text
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $param = $request->getParsedBody()['text'];
        $data = new TextLengthConstraint($param);
        $errors = $this->validator->validate($data);
        $message = $this->validator->getErrorMessage($errors);
        if (!$message) {
            $this->service->addTask($param);
            return new EmptyResponse(201);
        }
        throw new InvalidArgumentException($message, 404);
    }
}