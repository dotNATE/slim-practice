<?php


namespace App\Factories;


use App\Controllers\MarkTaskCompletedController;
use Psr\Container\ContainerInterface;

class MarkTaskCompletedControllerFactory
{
    public function __invoke(ContainerInterface $container): MarkTaskCompletedController
    {
        $model = $container->get('TasksModel');

        return new MarkTaskCompletedController($model);
    }
}