<?php

namespace ProjectManager\Entities;

class SpecificProjectEntity extends ProjectEntity implements \JsonSerializable
{
    private string $client_name;
    private string $client_logo;
    private array $users;


    public function getClientName(): string
    {
        return $this->client_name;
    }

    public function getClientLogo(): string
    {
        return $this->client_logo;
    }

    public function setUsers(array $users)
    {
        foreach ($users as $user)
        {
            if($user instanceof UserEntity) {
                $this->users = $users;
            } else {
                throw new \Exception ('Array contents are not correct');
            }
        }
        $this->users = $users;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "client_id" => $this->client_id,
            "client_name" => $this->client_name,
            "client_logo" => $this->client_logo,
            "deadline" => $this->getDeadline(),
            "overdue" => $this->getOverdue(),
            "users" => $this->users
        ];
    }

}