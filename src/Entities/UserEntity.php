<?php

namespace ProjectManager\Entities;

class UserEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private string $avatar;
    private string $role;

    public function getName(): string
    {
        return $this->name;
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