<?php declare(strict_types=1);


namespace TaskManagement\Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;
use TaskManagement\Application\Domain\Task;
use TaskManagement\Application\Domain\TaskId;
use TaskManagement\Application\Domain\Title;

final class TaskTest extends TestCase
{
    /** @test */
    public function it_can_be_created(): void
    {
        $id = TaskId::fromString('5b338480-b841-44ce-83d7-8db12cada4c4');
        $title = new Title('A title');
        $sut = new Task($id, $title);

        self::assertEquals('5b338480-b841-44ce-83d7-8db12cada4c4', $sut->id()->toString());
    }

    /** @test */
    public function it_has_a_title(): void
    {
        $id = TaskId::fromString('5b338480-b841-44ce-83d7-8db12cada4c4');
        $title = new Title('A title');
        $sut = new Task($id, $title);

        self::assertEquals($title, $sut->title());
    }
}
