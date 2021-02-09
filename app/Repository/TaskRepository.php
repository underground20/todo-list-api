<?php

namespace App\Repository;

use App\Entity\Status;
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
        return $this->repo->findBy(['status' => Status::TASK_IN_WORK]);
    }

    public function findArchivedTasks()
    {
        return $this->repo->findBy(['status' => Status::TASK_DONE]);
    }

    public function findOne($id)
    {
        return $this->repo->find($id);
    }
}