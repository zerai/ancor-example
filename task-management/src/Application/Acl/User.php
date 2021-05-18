<?php

declare(strict_types=1);

namespace TaskManagement\Application\Acl;

/**
 * null
 * @codeCoverageIgnore
 */
final class User
{
    private string $id;
    private string $username;
    private string $email;

    public function __construct(string $id, string $username, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function withId(string $id): self
    {
        return new self(
            $id,
            $this->username,
            $this->email
        );
    }

    public function username(): string
    {
        return $this->username;
    }

    public function withUsername(string $username): self
    {
        return new self(
            $this->id,
            $username,
            $this->email
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
            $this->username,
            $email
        );
    }

    public static function fromArray(array $data): self
    {
        if (!isset($data['id']) || !\is_string($data['id'])) {
            throw new \InvalidArgumentException('Error on "id": string expected');
        }

        if (!isset($data['username']) || !\is_string($data['username'])) {
            throw new \InvalidArgumentException('Error on "username": string expected');
        }

        if (!isset($data['email']) || !\is_string($data['email'])) {
            throw new \InvalidArgumentException('Error on "email": string expected');
        }

        return new self(
            $data['id'],
            $data['username'],
            $data['email'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
        ];
    }

    public function equals(?User $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }

        if ($this->id !== $other->id) {
            return false;
        }

        if ($this->username !== $other->username) {
            return false;
        }

        if ($this->email !== $other->email) {
            return false;
        }

        return true;
    }
}
