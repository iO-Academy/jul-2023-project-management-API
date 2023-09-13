<?php

namespace ProjectManager\Hydrators;

class TasksHydrator
{
    public static function getTasksByUserAndProjectId(\PDO $db): array
    {
        $query = $db->prepare('SELECT `id`, `project_id`, `user_id`, `name`, `estimate`, `deadline` FROM `tasks`');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, TaskEntity::class);
        return $query->fetchAll();
    }
}