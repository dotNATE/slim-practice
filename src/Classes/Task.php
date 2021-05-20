<?php


namespace App\Classes;


class Task
{
    protected $id;
    protected $taskContent;
    protected $isCompleted;
    protected $isDeleted;

    public function getId(): string
    {
        return $this->id;
    }

    public function getTaskContent(): string
    {
        return $this->taskContent;
    }

    public function getIsCompleted(): bool
    {
        if ($this->isCompleted) return true;
        return false;
    }

    public function getIsDeleted(): bool
    {
        if ($this->isDeleted) return true;
        return false;
    }
}