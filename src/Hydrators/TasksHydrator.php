<?php

namespace ProjectManager\Hydrators;

use ProjectManager\Entities\TaskEntity;

class TasksHydrator
{
    public static function getTasksByUserAndProjectId(\PDO $db, int $projectId, $userId)
    {
        $query = $db->prepare('SELECT `id`, `project_id`, `user_id`, `name`, `estimate`, `deadline` FROM `tasks` WHERE `project_id` = ? AND `user_id` = ?');
        $query->execute([$projectId, $userId]);
        $query->setFetchMode(\PDO::FETCH_CLASS, TaskEntity::class);
        return $query->fetchAll();
    }
}