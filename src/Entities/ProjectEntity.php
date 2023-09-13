<?php

namespace ProjectManager\Entities;

use ProjectManager\Services\DateService;

class ProjectEntity implements \JsonSerializable {

    protected int $id;
    protected string $name;
    protected int $client_id;
    private ?string $deadline;

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

    public function getDeadline(): ?string
    {
        if ($this->deadline) {
            return DateService::convertToUkFormat($this->deadline);
        } else {
            return null;
        }
    }

    protected function getOverdue(): ?bool
    {
        if ($this->deadline) {
            return DateService::isOverdue($this->deadline);
        } else {
            return null;
        }
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
