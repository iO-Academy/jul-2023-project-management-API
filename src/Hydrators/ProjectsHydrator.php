<?php

namespace ProjectManager\Hydrators;

use ProjectManager\Entities\ProjectEntity;
use ProjectManager\Entities\SpecificProjectEntity;
use ProjectManager\Entities\UserEntity;
use function PHPUnit\Framework\throwException;

class ProjectsHydrator {
    public static function getProjects(\PDO $db)
    {
        $query = $db->prepare('SELECT `id`, `name`, `client_id`, `deadline` FROM `projects`');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, ProjectEntity::class);
        return $query->fetchAll();
    }

    public static function getProject(\PDO $db, int $projectId)

    {
        $query = $db->prepare('SELECT `projects`.`id`, `projects`.`name`, `projects`.`deadline`, `clients`.`id` AS "client_id", `clients`.`name` AS "client_name", `logo` AS "client_logo" FROM `clients` JOIN `projects` ON `clients`.`id` = `projects`.`client_id` WHERE `projects`.`id` = ?');
        $query->execute([$projectId]);
        $query->setFetchMode(\PDO::FETCH_CLASS,SpecificProjectEntity::class);
        $projectEntity = $query->fetch();
        return self::getUsersByProjectId($db, $projectId, $projectEntity);
    }

    private static function getUsersByProjectId(\PDO $db, int $projectId, SpecificProjectEntity $projectEntity)
    {
        $query = $db->prepare('SELECT `users`.`id`,`name`, `avatar`, `role` FROM `users` JOIN `project_users` ON `users`.`id` = `project_users`.`user_id` WHERE `project_id` = ?');
        $query->execute([$projectId]);
        $query->setFetchMode(\PDO::FETCH_CLASS,UserEntity::class);
        $users = $query->fetchAll();
        $projectEntity->setUsers($users);
        return $projectEntity;
    }
}
