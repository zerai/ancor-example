<?php declare(strict_types=1);


namespace TaskManagement\Application\Acl;

use TaskManagement\Application\Domain\Assegnee;
use TaskManagement\Application\Domain\AssigneeService;

class TranslatingAssigneeService implements AssigneeService
{
    private ForGettingEmployees $employeeRepository;
    private ForGettingUsers $userRepository;

    /**
     * TranslatingAssigneeService constructor.
     * @param ForGettingEmployees $employeeRepository
     * @param ForGettingUsers $userRepository
     */
    public function __construct(ForGettingEmployees $employeeRepository, ForGettingUsers $userRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
    }


    public function getFromId(string $assigneeId): Assegnee
    {
        $employee = $this->employeeRepository->getEmployeeFromId($assigneeId);
        $user = $this->userRepository->getUserFromId($assigneeId);

        return AssigneeTranslator::assigneeFromEmployeeAndUser($employee, $user);
    }
}
