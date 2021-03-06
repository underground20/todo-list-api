<?php

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions(
    require __DIR__ . '/settings.php',
    require __DIR__ . '/doctrine.php',
    require __DIR__ . '/repository.php',
    require __DIR__ . '/serializer.php',
    require __DIR__ . '/validator.php'
);
return $builder->build();