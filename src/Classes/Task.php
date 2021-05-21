<?php


namespace App\Classes;


class Task
{
    protected $id;
    protected $taskContent;
    protected $isCompleted;
    protected $isDeleted;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTaskContent(): string
    {
        return $this->taskContent;
    }

    /**
     * @return bool
     */
    public function getIsCompleted(): bool
    {
        return $this->isCompleted;
    }

    /**
     * @return bool
     */
    public function getIsDeleted(): bool
    {
        return $this->isDeleted;
    }
}