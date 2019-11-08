<?php

class Task
{
    protected $id;
    protected $title;
    protected $description;
    protected $status;
    protected $priority;

    public function getID()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPriority()
    {
        return $this->priority;
    }
}
