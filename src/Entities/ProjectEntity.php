<?php

namespace ProjectManager\Entities;

use ProjectManager\Services\DateService;

class ProjectEntity implements JsonSerializable {

    private int $id;
    private string $name;
    private int $client_id;
    private string $deadline;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

    public function getDeadline(): string
    {
        return $this->deadline;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "client_id" => $this->client_id,
            "deadline" => $this->deadline,
            "overdue" => DateService::isOverdue($this->deadline)
        ];
    }
}
