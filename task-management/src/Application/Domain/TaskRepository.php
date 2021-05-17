<?php declare(strict_types=1);


namespace TaskManagement\Application\Domain;

/*
 * Driven Port
 */
interface TaskRepository
{
    public function nextId(): TaskId;

    public function storeTask(Task $aTask): void;

    public function withId(TaskId $taskId): Task;
}
