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

    public function findActiveTasks()
    {
        return $this->repo->findBy([self::FIELD_STATUS_NAME => Status::TASK_IN_WORK]);
    }

    public function findArchivedTasks()
    {
        return $this->repo->findBy([self::FIELD_STATUS_NAME => Status::TASK_DONE]);
    }

    public function findOne($id)
    {
        return $this->repo->find($id);
    }
}