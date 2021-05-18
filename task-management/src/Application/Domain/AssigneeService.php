<?php declare(strict_types=1);


namespace TaskManagement\Application\Domain;

/*
 * DSI: Domain Service Interface
 *
 * It will be implemented by the ACL
 */
interface AssigneeService
{
    public function getFromId(string $assigneeId): Assegnee;
}
