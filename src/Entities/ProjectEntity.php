<?php

namespace ProjectManager\Entities;

use ProjectManager\Services\DateService;

class ProjectEntity implements \JsonSerializable {

    protected int $id;
    protected string $name;
    protected int $client_id;
    protected ?string $deadline;

    public function getName(): string
    {
        return $this->name;
    }

    public function getDeadline(): ?string
    {
        return $this->deadline ? DateService::convertToUkFormat($this->deadline) : null;
    }

    protected function getOverdue(): ?bool
    {
        return $this->deadline ? DateService::isOverdue($this->deadline) : null;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "client_id" => $this->client_id,
            "deadline" => $this->getDeadline(),
            "overdue" => $this->getOverdue()
        ];
    }
}
