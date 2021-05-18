<?php declare(strict_types=1);

namespace TaskManagement\Adapter\Acl\ForGettingUsers\Stub;

use TaskManagement\Application\Acl\Exception\UserNullReference;
use TaskManagement\Application\Acl\ForGettingUsers;
use TaskManagement\Application\Acl\User;

/**
 * @codeCoverageIgnore
 */
class ForGettingUsersStubAdapter implements ForGettingUsers
{
    /** @var array<array-key, User>  */
    private array $users = [];

    /** @param  array<array-key, User> $users */
    public function __construct(array $users = [])
    {
        $this->users = $users;
    }

    public function getUserFromId(string $userId): User
    {
        if (array_key_exists($userId, $this->users)) {
            return $this->users[$userId];
        }

        throw new UserNullReference("User with id: $userId not found");
    }
}
