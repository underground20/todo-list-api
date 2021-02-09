<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\ORM\EntityRepository;

class TaskRepository
{
    private EntityRepository $repo;

    public function __construct(EntityRepository $repo)
    {
        $this->repo = $repo;
    }

    public function findActiveTasks()
    {
        return $this->repo->findBy(['status' => Task::STATUS_IN_WORK]);
    }

    public function findArchivedTasks()
    {
        return $this->repo->findBy(['status' => Task::STATUS_DONE]);
    }

    public function findOne($id)
    {
        return $this->repo->find($id);
    }
}