<?php

namespace App\Repository;

use App\Entity\Status;
use Doctrine\ORM\EntityRepository;

class TaskRepository
{
    public const FIELD_STATUS_NAME = 'status';

    private EntityRepository $repo;

    public function __construct(EntityRepository $repo)
    {
        $this->repo = $repo;
    }

    public function findActiveTasks(): array
    {
        return $this->repo->findBy([self::FIELD_STATUS_NAME => Status::TASK_IN_WORK]);
    }

    public function findArchivedTasks(): array
    {
        return $this->repo->findBy([self::FIELD_STATUS_NAME => Status::TASK_DONE]);
    }

    /**
     * @param string $id
     * @return object
     * @throws \InvalidArgumentException if task with id not find
     */
    public function findOne(string $id): object
    {
        if ($task = $this->repo->find($id)) {
            return $task;
        }
        throw new \InvalidArgumentException('Task with current id not exist');
    }
}