<?php declare(strict_types=1);


namespace TaskManagement\Application\Acl;

interface ForGettingUsers
{
    public function getUserFromId(string $userId): User;
}
