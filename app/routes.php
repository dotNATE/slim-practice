<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'HomePageController');
    $app->post('/', 'AddTaskController');
    $app->post('/mark', 'MarkTaskCompletedController');
    $app->get('/completed', 'CompletedPageController');
    $app->get('/delete/{id}', 'DeleteTaskController');
};