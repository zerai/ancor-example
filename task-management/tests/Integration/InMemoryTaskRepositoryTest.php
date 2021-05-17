<?php declare(strict_types=1);
namespace TaskManagement\Tests\Integration;

use PHPUnit\Framework\TestCase;
use TaskManagement\Adapter\Driven\InMemoryTaskRepository;
use TaskManagement\Application\Domain\Task;
use TaskManagement\Application\Domain\TaskId;
use TaskManagement\Application\Domain\Title;

class InMemoryTaskRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_generate_new_identity(): void
    {
        $sut = new InMemoryTaskRepository();
        $result = $sut->nextId();

        self::assertInstanceOf(TaskId::class, $result);
    }

    /** @test */
    public function it_should_store_a_task(): void
    {
        $sut = new InMemoryTaskRepository();
        $id = TaskId::fromString('5b338480-b841-44ce-83d7-8db12cada4c4');
        $title = new Title('A title');

        $task = new Task($id, $title);

        $sut->storeTask($task);

        self::assertEquals($task, $sut->withId($id));
    }
}
