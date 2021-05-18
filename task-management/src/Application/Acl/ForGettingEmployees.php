<?php declare(strict_types=1);

namespace TaskManagement\Application\Acl;

interface ForGettingEmployees
{
    public function getEmployeeFromId(string $employeeId): Employee;
}
