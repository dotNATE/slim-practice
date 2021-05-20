<?php


namespace App\Factories;


use App\Models\TasksModel;
use Psr\Container\ContainerInterface;

class TasksModelFactory
{
    public function __invoke(ContainerInterface $container): TasksModel
    {
        $db = $container->get('db');
        return new TasksModel($db);
    }
}