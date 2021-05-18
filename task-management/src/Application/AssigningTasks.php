<?php declare(strict_types=1);


namespace TaskManagement\Application;

use TaskManagement\Application\Domain\Task;
use TaskManagement\Application\Domain\TaskId;

/** Driver Port  */
interface AssigningTasks
{
    public function assignTask(AssignTaskRequest $assignTaskRequest): void;

    public function getTaskById(TaskId $taskId): Task;
}
