<?php


namespace App\Models;


use App\Classes\Task;
use PDO;

class TasksModel
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getUncompletedTasks(): array
    {
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `isCompleted` = '0' AND `isDeleted` = '0';");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
        return $query->fetchAll();
    }

    public function getCompletedTasks(): array
    {
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `isCompleted` = '1' AND `isDeleted` = '0';");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
        return $query->fetchAll();
    }

    public function addNewTask($content): void
    {
        if (strlen($content) > 0) {
            $query = $this->db->prepare("INSERT INTO `tasks` (`taskContent`) VALUES (:content);");
            $query->execute(['content' => $content]);
        }
    }

    public function markTaskCompleted($id): void
    {
        $query = $this->db->prepare("UPDATE `tasks` SET `isCompleted` = '1' WHERE `id` = :id;");
        $query->execute(['id' => $id]);
    }

    public function deleteTask($id): void
    {
        $query = $this->db->prepare("UPDATE `tasks` SET `isDeleted` = :deleted WHERE `id` = :id;");
        $query->execute(['id' => $id, 'deleted' => '1']);
    }
}