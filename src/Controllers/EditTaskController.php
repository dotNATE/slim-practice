<?php


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EditTaskController
{
    protected $model;
    protected $view;

    public function __construct(TasksModel $model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }


    public function __invoke(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        return $this->view->render($response, "editTask.php", ['id' => $id]);
    }
}