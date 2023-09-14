<?php

namespace ProjectManager\Hydrators;

use ProjectManager\Entities\SpecificTaskEntity;
use ProjectManager\Entities\TaskEntity;

class TasksHydrator
{
    public static function getTasksByUserAndProjectId(\PDO $db, int $projectId, int $userId): array
    {
        $query = $db->prepare('SELECT `id`, `project_id`, `user_id`, `name`, `estimate`, `deadline` FROM `tasks` WHERE `project_id` = ? AND `user_id` = ?');
        $query->execute([$projectId, $userId]);
        $query->setFetchMode(\PDO::FETCH_CLASS, TaskEntity::class);
        return $query->fetchAll();
    }

    public static function getTaskByUserAndProjectId(\PDO $db, int $taskId)
    {
        $query = $db->prepare('SELECT `id`, `project_id`, `user_id`, `name`, `description`, `estimate`, `deadline` FROM `tasks` WHERE `id` = ?');
        $query->execute([$taskId]);
        $query->setFetchMode(\PDO::FETCH_CLASS, SpecificTaskEntity::class);
        return $query->fetch();
    }
}