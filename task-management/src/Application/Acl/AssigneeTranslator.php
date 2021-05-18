<?php declare(strict_types=1);


namespace TaskManagement\Application\Acl;

use TaskManagement\Application\Domain\Assegnee;
use TaskManagement\Application\Domain\AssigneeId;
use TaskManagement\Application\Domain\Email;
use TaskManagement\Application\Domain\Name;

class AssigneeTranslator
{
    public static function assigneeFromEmployeeAndUser(Employee $employee, User $user): Assegnee
    {
        $assigneeId = new AssigneeId($user->id());
        $assigneeName = new Name($employee->firstName() . ' ' . $employee->lastName());
        $assigneeEmail = new Email($employee->email());

        return new Assegnee(
            $assigneeId,
            $assigneeName,
            $assigneeEmail
        );
    }
}
