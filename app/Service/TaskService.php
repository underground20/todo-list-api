<?php

namespace App\Service;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;

class TaskService
{
    private TaskRepository $taskRepo;
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, TaskRepository $taskRepo)
    {
        $this->em = $em;
        $this->taskRepo = $taskRepo;
    }

    public function getActive()
    {
        return $this->taskRepo->findActiveTasks();
    }

    public function getArchived()
    {
        return $this->taskRepo->findArchivedTasks();
    }

    public function addTask($text): int
    {
        $task = new Task();
        $task->setText($text);
        $task->setStatusActive();
        $this->em->persist($task);
        $this->em->flush();

        return $task->getId();
    }

    public function deleteTask($id): void
    {
        if ($task = $this->taskRepo->findOne($id)) {
            $this->em->remove($task);
            $this->em->flush();
        }
        throw new \InvalidArgumentException('Task with current id not exist');
    }

    public function changeStatusOnDone($id): int
    {
        if ($task = $this->taskRepo->findOne($id)) {
            $task->setStatusDone();
            $this->em->persist($task);
            $this->em->flush();
            return $task->getStatus();
        }
        throw new \InvalidArgumentException('Task with current id not exist');
    }


}