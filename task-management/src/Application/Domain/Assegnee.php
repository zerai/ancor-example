<?php

declare(strict_types=1);

namespace TaskManagement\Application\Domain;

/**
 * null
 * @codeCoverageIgnore
 */
class Assegnee
{
    private AssigneeId $id;
    private Name $name;
    private Email $email;

    public function __construct(AssigneeId $id, Name $name, Email $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function id(): AssigneeId
    {
        return $this->id;
    }

    public function withId(AssigneeId $id): self
    {
        return new self(
            $id,
            $this->name,
            $this->email
        );
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function withName(Name $name): self
    {
        return new self(
            $this->id,
            $name,
            $this->email
        );
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function withEmail(Email $email): self
    {
        return new self(
            $this->id,
            $this->name,
            $email
        );
    }

    public static function fromArray(array $data): self
    {
        if (!isset($data['id']) || !\is_string($data['id'])) {
            throw new \InvalidArgumentException('Error on "id", string expected');
        }

        if (!isset($data['name']) || !\is_string($data['name'])) {
            throw new \InvalidArgumentException('Error on "name", string expected');
        }

        if (!isset($data['email']) || !\is_string($data['email'])) {
            throw new \InvalidArgumentException('Error on "email", string expected');
        }

        return new self(
            new AssigneeId($data['id']),
            new Name($data['name']),
            new Email($data['email']),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'email' => $this->email->value(),
        ];
    }

    public function equals(?Assegnee $other): bool
    {
        if (!$other instanceof self) {
            return false;
        }

        if (!$this->id->equals($other->id)) {
            return false;
        }

        if (!$this->name->equals($other->name)) {
            return false;
        }

        if (!$this->email->equals($other->email)) {
            return false;
        }

        return true;
    }
}
