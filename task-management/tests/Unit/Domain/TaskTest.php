<?php declare(strict_types=1);


namespace TaskManagement\Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use TaskManagement\Application\Domain\Assegnee;
use TaskManagement\Application\Domain\AssigneeId;
use TaskManagement\Application\Domain\Email;
use TaskManagement\Application\Domain\Name;
use TaskManagement\Application\Domain\Task;
use TaskManagement\Application\Domain\TaskId;
use TaskManagement\Application\Domain\Title;

final class TaskTest extends TestCase
{
    public const UUID = '5b338480-b841-44ce-83d7-8db12cada4c4';

    /** @test */
    public function it_can_be_created(): void
    {
        $sut = $this->createTask(self::UUID);

        self::assertEquals(self::UUID, $sut->id()->toString());
    }

    /** @test */
    public function it_has_a_title(): void
    {
        $sut = $this->createTask(self::UUID, 'A title');

        self::assertEquals('A title', $sut->title()->value());
    }

    /** @test */
    public function it_has_an_assegnee(): void
    {
        $sut = $this->createTask(self::UUID, 'A title', '', 'j.doe', 'jdoe@example.com');

        self::assertEquals('j.doe', $sut->assignee()->name()->value());
        self::assertEquals('jdoe@example.com', $sut->assignee()->email()->value());
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
