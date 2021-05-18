<?php declare(strict_types=1);

namespace TaskManagement\Adapter\Acl\ForGettingUsers\Http;

use Psr\Http\Client\ClientInterface;
use RuntimeException;
use TaskManagement\Application\Acl\Employee;
use TaskManagement\Application\Acl\ForGettingUsers;
use TaskManagement\Application\Acl\User;

/**
 * @codeCoverageIgnore
 */
class ForGettingUsersHttpAdapter implements ForGettingUsers
{
    private ClientInterface $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    public function getEmployeeFromId(string $employeeId): Employee
    {
        // Makes a http request to the rest api method
        // Gets the JSON data
        // Translate JSON into Employee object
        throw new RuntimeException("Web Adapter Not Implemented");
    }

    public function getUserFromId(string $userId): User
    {
        // Makes a http request to the rest api method
        // Gets the JSON data
        // Translate JSON into User object
        throw new RuntimeException("Web Adapter Not Implemented");
    }
}
