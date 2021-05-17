<?php declare(strict_types=1);


namespace TaskManagement\Application\Domain;

final class Task
{
    private TaskId $id;
    private Title $title;

    public function __construct(TaskId $id, Title $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function title(): Title
    {
        return $this->title;
    }
}
