<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
$db = \ProjectManager\Services\DbConnector::connect();
$data = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db);
    if (is_int(['project_id']) && ['project_id'] > 0) {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::TASK_SUCCESS_MESSAGE);
        if (empty($jsonData)){
            \ProjectManager\Services\ConvertToJsonService::NoTasksAssignedToThatUserErrorResponse();
        }
    } else {
        \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
    }
    } catch (Exception $e) {
        echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
    }


