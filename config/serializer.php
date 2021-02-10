<?php

use Psr\Container\ContainerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

return [
    Serializer::class => function (ContainerInterface $container) {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        return new Serializer([$normalizer], [$encoder],);
    }
];