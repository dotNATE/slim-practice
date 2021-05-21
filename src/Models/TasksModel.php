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

    /**
     * selects all from the database that are not marked as complete or deleted
     * @return array of hydrated Task objects
     */
    public function getUncompletedTasks(): array
    {
        $query = $this->db->prepare("SELECT `id`, `taskContent`, `isCompleted`, `isDeleted` FROM `tasks` WHERE `isCompleted` = '0' AND `isDeleted` = '0';");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
        return $query->fetchAll();
    }

    /**
     * selects all from the database that are marked as complete, but NOT deleted
     * @return array of hydrated Task objects
     */
    public function getCompletedTasks(): array
    {
        $query = $this->db->prepare("SELECT `id`, `taskContent`, `isCompleted`, `isDeleted` FROM `tasks` WHERE `isCompleted` = '1' AND `isDeleted` = '0';");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
        return $query->fetchAll();
    }

    /**
     * adds a new task to the database if the length of $content is greater than 0 characters
     * @param string $content
     */
    public function addNewTask(string $content): void
    {
        if (strlen($content) > 0) {
            $query = $this->db->prepare("INSERT INTO `tasks` (`taskContent`) VALUES (:content);");
            $query->execute(['content' => $content]);
        }
    }

    /**
     * searches database for existing task, using id, and marks it as completed
     * @param string $id
     */
    public function markTaskCompleted(string $id): void
    {
        $query = $this->db->prepare("UPDATE `tasks` SET `isCompleted` = '1' WHERE `id` = :id;");
        $query->execute(['id' => $id]);
    }

    /**
     * searches database for existing task, using id, and marks it as deleted (soft delete)
     * @param string $id
     */
    public function deleteTask($id): void
    {
        $query = $this->db->prepare("UPDATE `tasks` SET `isDeleted` = :deleted WHERE `id` = :id;");
        $query->execute(['id' => $id, 'deleted' => '1']);
    }

    /**
     * searches database for existing task, using id, and updates its taskContent field using the $newContent string
     * @param $id
     * @param $newContent
     */
    public function editTask($id, $newContent): void
    {
        $query = $this->db->prepare("UPDATE `tasks` SET `taskContent` = :newContent WHERE `id` = :id;");
        $query->execute(['newContent' => $newContent, 'id' => $id]);
    }
}