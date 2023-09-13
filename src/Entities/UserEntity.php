<?php

namespace ProjectManager\Entities;

class UserEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private string $avatar;
    private string $role;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "avatar" => $this->avatar,
            "role" => $this->role
        ];
    }
}