<?php

namespace ProjectManager\Hydrators;

use ProjectManager\Entities\ProjectEntity;
use ProjectManager\Entities\SpecificProjectEntity;
use ProjectManager\Entities\UserEntity;

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
        $query = $db->prepare('SELECT `id`,`name`,`client_id`,`deadline` FROM `projects` WHERE `id` = ?');
        $query->execute([$projectId]);
        $query->setFetchMode(\PDO::FETCH_CLASS,SpecificProjectEntity::class);
        $projectEntity = $query->fetch();
        return self::getUsersByProjectId($db, $projectId, $projectEntity);
    }

    private static function getUsersByProjectId(\PDO $db, int $projectId, SpecificProjectEntity $projectEntity)
    {
        $query = $db->prepare('SELECT `id`,`name`,`avatar`,`role` FROM `projects` WHERE `id` = ?');
        $query->execute([$projectId]);
        $query->setFetchMode(\PDO::FETCH_CLASS,UserEntity::class);
        $users = $query->fetchAll();
        $projectEntity->setUsers($users);
        return $projectEntity;
    }
}
