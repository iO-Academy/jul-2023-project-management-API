<?php

namespace ProjectManager\Entities;

use ProjectManager\Services\DateService;

class TaskEntity implements \JsonSerializable
{
    private int $id;
    private int $project_id;
    private int $user_id;
    private string $name;
    private ?int $estimate;
    protected ?string $deadline;

    public function getDeadline(): ?string
    {
        return $this->deadline ? DateService::convertToUkFormat($this->deadline) : null;
    }

    private function getOverdue(): ?bool
    {
        return $this->deadline ? DateService::isOverdue($this->deadline) : null;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "project_id" => $this->project_id,
            "user_id" => $this->user_id,
            "name" => $this->name,
            "estimate" => $this->estimate,
            "deadline" => $this->getDeadline(),
            "overdue" => $this->getOverdue()
        ];
    }
}