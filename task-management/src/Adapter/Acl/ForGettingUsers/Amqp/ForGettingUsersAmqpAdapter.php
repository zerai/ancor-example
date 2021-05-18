<?php declare(strict_types=1);

namespace TaskManagement\Adapter\Acl\ForGettingUsers\Amqp;

use RuntimeException;
use TaskManagement\Application\Acl\ForGettingUsers;
use TaskManagement\Application\Acl\User;

/**
 * @codeCoverageIgnore
 */
class ForGettingUsersAmqpAdapter implements ForGettingUsers
{
    public function getUserFromId(string $userId): User
    {
        // TODO: Implement getUserFromId() method.
        throw new RuntimeException("Amqp Adapter Not Implemented");
    }
}
