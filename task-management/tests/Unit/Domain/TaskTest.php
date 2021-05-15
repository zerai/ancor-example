<?php declare(strict_types=1);


namespace TaskManagement\Tests\Unit\Domain;


use PHPUnit\Framework\TestCase;
use TaskManagement\Application\Domain\Task;

final class TaskTest extends TestCase
{
    /** @test */
    public function it_can_be_created(): void
    {
        $sut = new Task("1");

        self::assertEquals('1', $sut->id());
    }

}
