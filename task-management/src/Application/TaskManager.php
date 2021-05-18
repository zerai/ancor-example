<?php declare(strict_types=1);


namespace TaskManagement\Application;

use TaskManagement\Application\Domain\AssigneeService;
use TaskManagement\Application\Domain\Task;
use TaskManagement\Application\Domain\TaskId;
use TaskManagement\Application\Domain\TaskRepository;
use TaskManagement\Application\Domain\Title;

final class TaskManager implements AssigningTasks
{
    private TaskRepository $repository;

    private AssigneeService $assigneeService;

    /**
     * TaskManager constructor.
     * @param TaskRepository $repository
     * @param AssigneeService $assigneeService
     */
    public function __construct(TaskRepository $repository, AssigneeService $assigneeService)
    {
        $this->repository = $repository;
        $this->assigneeService = $assigneeService;
    }


    public function assignTask(AssignTaskRequest $assignTaskRequest): void
    {
        $taskId = TaskId::fromString($assignTaskRequest->taskId);
        $taskTitle = new Title($assignTaskRequest->taskTitle);
        $assignee = $this->assigneeService->getFromId($assignTaskRequest->assigneeId);

        $task = new Task($taskId, $taskTitle, $assignee);

        $this->repository->storeTask($task);
    }

    public function getTaskById(TaskId $taskId): Task
    {
        return $this->repository->withId($taskId);
    }
}
