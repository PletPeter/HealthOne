<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 20/11/2018
 * Time: 03:02
 */

namespace AppBundle\Entity;


class FormMaker
{
    protected $task;
    protected $dueDate;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}