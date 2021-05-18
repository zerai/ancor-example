<?php declare(strict_types=1);


namespace TaskManagement\Adapter\Driven;

use TaskManagement\Application\Domain\Task;
use TaskManagement\Application\Domain\TaskId;
use TaskManagement\Application\Domain\TaskRepository;

class InMemoryTaskRepository implements TaskRepository
{
    /** @var Task[] */
    private array $tasks = [];

    public function nextId(): TaskId
    {
        return TaskId::generate();
    }

    public function storeTask(Task $aTask): void
    {
        $this->tasks[$aTask->id()->toString()] = $aTask;
    }

    /**
     * @param TaskId $taskId
     * @return Task
     */
    public function withId(TaskId $taskId): Task
    {
        return $this->tasks[$taskId->toString()];
    }
}
