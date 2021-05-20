<?php


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeleteTaskController
{
    protected $model;

    public function __construct(TasksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, $args): Response
    {
        $this->model->deleteTask($args['id']);
        return $response->withHeader('Location', '/');
    }
}