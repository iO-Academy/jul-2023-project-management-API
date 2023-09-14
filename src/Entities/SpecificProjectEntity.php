<?php

namespace ProjectManager\Entities;

class SpecificProjectEntity extends ProjectEntity implements \JsonSerializable
{
    private string $client_name;
    private string $client_logo;
    private array $users = [];

    public function setUsers(array $users): bool
    {
        foreach ($users as $user)
        {
            if($user instanceof UserEntity) {
                $this->users[] = $user;
            } else {
                throw new \Exception ('Array contents are not correct');
            }
        }
        return true;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "client_id" => $this->client_id,
            "client_name" => $this->client_name,
            "client_logo" => $this->client_logo,
            "users" => $this->users,
            "deadline" => $this->getDeadline(),
            "overdue" => $this->getOverdue(),
        ];
    }
}