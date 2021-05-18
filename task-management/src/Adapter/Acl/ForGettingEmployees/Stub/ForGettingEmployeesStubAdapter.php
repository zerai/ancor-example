<?php declare(strict_types=1);

namespace TaskManagement\Adapter\Acl\ForGettingEmployees\Stub;

use TaskManagement\Application\Acl\Employee;
use TaskManagement\Application\Acl\Exception\EmployeeNullReference;
use TaskManagement\Application\Acl\ForGettingEmployees;

/**
 * @codeCoverageIgnore
 */
class ForGettingEmployeesStubAdapter implements ForGettingEmployees
{
    /** @var Employee[]  */
    private array $employees = [];

    /** @param  array<array-key, Employee> $employees */
    public function __construct(array $employees = [])
    {
        $this->employees = $employees;
    }

    public function getEmployeeFromId(string $employeeId): Employee
    {
        if (array_key_exists($employeeId, $this->employees)) {
            return $this->employees[$employeeId];
        }

        throw new EmployeeNullReference("Employee with id: $employeeId not found");
    }
}
