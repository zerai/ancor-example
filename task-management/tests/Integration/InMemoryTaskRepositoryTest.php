<?php declare(strict_types=1);
namespace TaskManagement\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use TaskManagement\Adapter\Driven\InMemoryTaskRepository;
use TaskManagement\Application\Domain\Assegnee;
use TaskManagement\Application\Domain\AssigneeId;
use TaskManagement\Application\Domain\Email;
use TaskManagement\Application\Domain\Name;
use TaskManagement\Application\Domain\Task;
use TaskManagement\Application\Domain\TaskId;
use TaskManagement\Application\Domain\Title;

class InMemoryTaskRepositoryTest extends TestCase
{
    public const UUID = '5b338480-b841-44ce-83d7-8db12cada4c4';

    /** @test */
    public function it_should_generate_new_identity(): void
    {
        $sut = new InMemoryTaskRepository();
        $result = $sut->nextId();

        self::assertNotEmpty($result);
    }

    /** @test */
    public function it_should_store_a_task(): void
    {
        $sut = new InMemoryTaskRepository();
        $task = $this->createTask(self::UUID);

        $sut->storeTask($task);

        self::assertEquals($task, $sut->withId(TaskId::fromString(self::UUID)));
    }

    private function createTask(string $taskId = '', string $taskTitle = '', string $assigneeId = '', string $assigneeName = '', string $assigneeEmail = ''): Task
    {
        $taskId = ('' !== $taskId) ? TaskId::fromString($taskId) : TaskId::generate();
        $taskTitle = ('' !== $taskTitle) ? new Title($taskTitle) : new Title('irrelevant');
        $assigneeId = ('' !== $assigneeId) ? new AssigneeId($assigneeId) : new AssigneeId(Uuid::uuid4()->toString());
        $assigneeName = ('' !== $assigneeName) ? new Name($assigneeName) : new Name('irrelevant');
        $assigneeEmail = ('' !== $assigneeEmail) ? new Email($assigneeEmail) : new Email('irrelevant@example.com');

        $assignee = new Assegnee($assigneeId, $assigneeName, $assigneeEmail);
        return  new Task($taskId, $taskTitle, $assignee);
    }
}
