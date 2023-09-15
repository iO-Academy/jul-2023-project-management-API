<?php

namespace ProjectManager\Entities;

use ProjectManager\Services\DateService;

class TaskEntity implements \JsonSerializable
{
    protected int $id;
    protected int $project_id;
    protected int $user_id;
    protected string $name;
    protected ?int $estimate;
    protected ?string $deadline;

    protected function getDeadline(): ?string
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
            "project_id" => $this->project_id,
            "user_id" => $this->user_id,
            "name" => $this->name,
            "estimate" => $this->estimate,
            "deadline" => $this->getDeadline(),
            "overdue" => $this->getOverdue()
        ];
    }
}