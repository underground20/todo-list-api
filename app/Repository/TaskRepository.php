<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class TaskRepository
{
    private EntityManagerInterface $em;
    private EntityRepository $repo;

    public function __construct(EntityManagerInterface $em, EntityRepository $repo)
    {
        $this->em = $em;
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

    public function deleteTask($id)
    {
        if ($task = $this->repo->find($id)) {
            $this->em->remove($task);
            $this->em->flush();
            return true;
        }
        throw new \InvalidArgumentException('Task with current id not exist');
    }

    public function changeStatusOnDone($id)
    {
        if ($task = $this->repo->find($id)) {
            $task->setStatusDone();
            $this->em->persist($task);
            $this->em->flush();
            return $task->getStatus();
        }
        throw new \InvalidArgumentException('Task with current id not exist');
    }

    public function addTask($text)
    {
        $task = new Task();
        $task->setText($text);
        $task->setStatusActive();
        $this->em->persist($task);
        $this->em->flush();

        return $task->getId();
    }

}