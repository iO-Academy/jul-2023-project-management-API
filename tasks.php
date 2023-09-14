<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    $data = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db);
        if (is_int(['project_id']) && ['project_id'] > 0 && is_int(['user_id']) && ['user_id'] > 0) {
        $jsonData = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db);
    } else {
        if (!is_int(['project_id']) || ['project_id'] <= 0) {
            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
            echo $jsonData;
        }
        if (!is_int(['user_id']) || ['user_id'] <= 0) {
            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidUserIdResponse();
            echo $jsonData;
        }
    }
} catch (Exception $e) {
       echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
  }
