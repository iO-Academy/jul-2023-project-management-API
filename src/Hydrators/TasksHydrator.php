<?php

namespace ProjectManager\Hydrators;
use ProjectManager\Entities\TaskEntity;

use ProjectManager\Entities\TaskEntity;

class TasksHydrator
{
    public static function getTasksByUserAndProjectId(\PDO $db, int $projectId, int $userId): array
    {
        $query = $db->prepare('SELECT `id`, `project_id`, `user_id`, `name`, `estimate`, `deadline` FROM `tasks`');
        $query->execute([$projectId, $userId]);
        $query->setFetchMode(\PDO::FETCH_CLASS, TaskEntity::class);
        return $query->fetch();
    }
}