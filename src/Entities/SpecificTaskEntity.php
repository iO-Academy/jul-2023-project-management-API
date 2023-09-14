<?php

namespace ProjectManager\Entities;

use ProjectManager\Entities\TaskEntity;

class SpecificTaskEntity extends TaskEntity
{
    private string $description;

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "project_id" => $this->project_id,
            "user_id" => $this->user_id,
            "name" => $this->name,
            "description" => $this->description,
            "estimate" => $this->estimate,
            "deadline" => $this->getDeadline(),
            "overdue" => $this->getOverdue()
        ];
    }
}