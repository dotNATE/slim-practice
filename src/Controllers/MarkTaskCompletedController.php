<?php


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MarkTaskCompletedController
{
    protected $model;

    public function __construct(TasksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, $args): Response
    {
        $data = $request->getParsedBody();
        $this->model->markTaskCompleted($data['markComplete']);
        return $response->withHeader('Location', '/');
    }
}