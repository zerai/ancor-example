<?php declare(strict_types=1);

namespace TaskManagement\Adapter\Acl\ForGettingEmployees\Amqp;

use RuntimeException;
use TaskManagement\Application\Acl\Employee;
use TaskManagement\Application\Acl\ForGettingEmployees;

/**
 * @codeCoverageIgnore
 */
class ForGettingEmployeesAmqpAdapter implements ForGettingEmployees
{
    public function getEmployeeFromId(string $employeeId): Employee
    {
        // TODO: Implement getEmployeeFromId() method.
        throw new RuntimeException("Amqp Adapter Not Implemented");
    }
}
