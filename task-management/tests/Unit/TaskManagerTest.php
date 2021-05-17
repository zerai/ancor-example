<?php declare(strict_types=1);

namespace TaskManagement\Tests\Unit;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use TaskManagement\Application\AssignTaskRequest;
use TaskManagement\Application\Domain\Assegnee;
use TaskManagement\Application\Domain\AssigneeId;
use TaskManagement\Application\Domain\AssigneeService;
use TaskManagement\Application\Domain\Email;
use TaskManagement\Application\Domain\Name;
use TaskManagement\Application\Domain\TaskRepository;
use TaskManagement\Application\Domain\Title;
use TaskManagement\Application\TaskManager;

class TaskManagerTest extends TestCase
{
    /** @var TaskRepository & MockObject */
    private $taskRepository;

    /** @var AssigneeService & MockObject */
    private $assigneeService;

    private TaskManager $taskManager;

    protected function setUp(): void
    {
        $this->taskRepository = $this
            ->createMock(TaskRepository::class);

        $this->assigneeService = $this
            ->createMock(AssigneeService::class);

        $this->taskManager = new TaskManager(
            $this->taskRepository,
            $this->assigneeService
        );
    }

    public function testName(): void
    {
        $request = new AssignTaskRequest(
            '5b338480-b841-44ce-83d7-8db12cada4c4',
            'A title',
            'b941dc86-72d5-409d-8d6b-e34128859481'
        );

        $anAssegnee = $this->getMockBuilder(Assegnee::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->onlyMethods(['id', 'name', 'email'])
            ->getMock();

        $anAssegnee
            ->method('id')
            ->willReturn(new AssigneeId('b941dc86-72d5-409d-8d6b-e34128859481'))
        ;
        $anAssegnee
            ->method('name')
            ->willReturn(new Name('pippo'))
        ;
        $anAssegnee
            ->method('email')
            ->willReturn(new Email('pippo@example.com'))
        ;

        $this->assigneeService
            ->expects(self::once())
            ->method('getFromId')
            ->willReturn($anAssegnee);

        $this->taskRepository
            ->expects(self::once())
            ->method('storeTask')
            ->will(
                $this->returnCallback(
                    function ($task): void {
                        self::assertEquals('5b338480-b841-44ce-83d7-8db12cada4c4', $task->id()->__toString());
                        self::assertEquals(new Title('A title'), $task->title());
                    }
                )
            )
        ;

        $this->taskManager->assignTask($request);
    }
}
