<?php

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Psr\Container\ContainerInterface;

return [
    EntityRepository::class => function (ContainerInterface $container) {
        $em = $container->get(EntityManagerInterface::class);
        $metadata = $em->getClassMetadata(\App\Entity\Task::class);
        return new EntityRepository($em, $metadata);
    }
];