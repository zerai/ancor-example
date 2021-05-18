<?php declare(strict_types=1);

namespace TaskManagement\Application\Domain;

final class Task
{
    private TaskId $id;
    private Title $title;
    private Assegnee $assignee;

    public function __construct(TaskId $id, Title $title, Assegnee $assignee)
    {
        $this->id = $id;
        $this->title = $title;
        $this->assignee = $assignee;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function title(): Title
    {
        return $this->title;
    }

    public function assignee(): Assegnee
    {
        return $this->assignee;
    }
}
