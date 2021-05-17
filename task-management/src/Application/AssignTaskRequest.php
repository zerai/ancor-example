<?php declare(strict_types=1);


namespace TaskManagement\Application;

class AssignTaskRequest
{
    public string $taskId;
    public string $taskTitle;
    public string $assigneeId;

    public function __construct(string $taskId, string $taskTitle, string $assigneeId)
    {
        $this->taskId = $taskId;
        $this->taskTitle = $taskTitle;
        $this->assigneeId = $assigneeId;
    }
}
