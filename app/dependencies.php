<?php
declare(strict_types=1);

use App\Classes\Task;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['db'] = function () {
        $db = new PDO('mysql:host=127.0.0.1;dbname=todo_list_app', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);
        return $db;
    };

    $container['TasksModel'] = DI\factory('\App\Factories\TasksModelFactory');
    $container['HomePageController'] = DI\factory('\App\Factories\HomePageControllerFactory');
    $container['CompletedPageController'] = DI\factory('\App\Factories\CompletedPageControllerFactory');
    $container['AddTaskController'] = DI\factory('\App\Factories\AddTaskControllerFactory');
    $container['MarkTaskCompletedController'] = DI\factory('\App\Factories\MarkTaskCompletedControllerFactory');
    $container['DeleteTaskController'] = DI\factory('\App\Factories\DeleteTaskControllerFactory');
    $container['EditTaskController'] = DI\factory('\App\Factories\EditTaskControllerFactory');
    $container['SubmitEditTaskController'] = DI\factory('\App\Factories\SubmitEditTaskControllerFactory');

    $containerBuilder->addDefinitions($container);
};