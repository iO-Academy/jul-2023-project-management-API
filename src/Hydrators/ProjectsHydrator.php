<?php

namespace ProjectManager\Hydrators;

class ProjectsHydrator {
    public static function getProjects(PDO $db) {
        $query = $db->prepare('SELECT `id`, `name`, `client_id`, `deadline` FROM `projects`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, ProjectEntity::class);
        return $query->fetchAll();
    }
}