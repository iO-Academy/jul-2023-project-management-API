<?php

namespace ProjectManager\Hydrators;

use ProjectManager\Entities\ProjectEntity;

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
        return $query->fetch();

    }
    private static function getUsersByProjectId(\PDO $db, int $projectId)
    {
        $query = $db->prepare('SELECT `id`,`name`,`avatar`,`role` FROM `projects` WHERE `id` = ?');
        $query->execute([$projectId]);
        $query->setFetchMode(\PDO::FETCH_CLASS,UserEntity::class);
    }
}