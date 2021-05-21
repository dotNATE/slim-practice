<?php


namespace App\Factories;


use App\Controllers\SubmitEditTaskController;
use Psr\Container\ContainerInterface;

class SubmitEditTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): SubmitEditTaskController
    {
        $model = $container->get('TasksModel');
        $view = $container->get('renderer');

        return new SubmitEditTaskController($model, $view);
    }
}