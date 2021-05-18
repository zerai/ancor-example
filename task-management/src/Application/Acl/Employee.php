<?php

declare(strict_types=1);

namespace TaskManagement\Application\Acl;

/**
 * null
 * @codeCoverageIgnore
 */
final class Employee
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $job;

    public function __construct(string $id, string $firstName, string $lastName, string $email, string $job)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->job = $job;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function withId(string $id): self
    {
        return new self(
            $id,
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->job
        );
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function withFirstName(string $firstName): self
    {
        return new self(
            $this->id,
            $firstName,
            $this->lastName,
            $this->email,
            $this->job
        );
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function withLastName(string $lastName): self
    {
        return new self(
            $this->id,
            $this->firstName,
            $lastName,
            $this->email,
            $this->job
        );
    }

    public function email(): string
    {
        return $this->email;
    }

    public function withEmail(string $email): self
    {
        return new self(
            $this->id,
            $this->firstName,
            $this->lastName,
            $email,
            $this->job
        );
    }

    public function job(): string
    {
        return $this->job;
    }

    public function withJob(string $job): self
    {
        return new self(
            $this->id,
            $this->firstName,
            $this->lastName,
            $this->email,
            $job
        );
    }

    public static function fromArray(array $data): self
    {
        if (!isset($data['id']) || !\is_string($data['id'])) {
            throw new \InvalidArgumentException('Error on "id": string expected');
        }

        if (!isset($data['firstName']) || !\is_string($data['firstName'])) {
            throw new \InvalidArgumentException('Error on "firstName": string expected');
        }

        if (!isset($data['lastName']) || !\is_string($data['lastName'])) {
            throw new \InvalidArgumentException('Error on "lastName": string expected');
        }

        if (!isset($data['email']) || !\is_string($data['email'])) {
            throw new \InvalidArgumentException('Error on "email": string expected');
        }

        if (!isset($data['job']) || !\is_string($data['job'])) {
            throw new \InvalidArgumentException('Error on "job": string expected');
        }

        return new self(
            $data['id'],
            $data['firstName'],
            $data['lastName'],
            $data['email'],
            $data['job'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'job' => $this->job,
        ];
    }

    public function equals(?Employee $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }

        if ($this->id !== $other->id) {
            return false;
        }

        if ($this->firstName !== $other->firstName) {
            return false;
        }

        if ($this->lastName !== $other->lastName) {
            return false;
        }

        if ($this->email !== $other->email) {
            return false;
        }

        if ($this->job !== $other->job) {
            return false;
        }

        return true;
    }
}
