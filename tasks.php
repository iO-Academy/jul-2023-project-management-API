<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
$db = \ProjectManager\Services\DbConnector::connect();
$data = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db);
    if ($_GET['project_id, user_id']) {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::PROJECT_SUCCESS_MESSAGE);
        if (empty($jsonData)){
            \ProjectManager\Services\ConvertToJsonService::NoTasksAssignedToThatUserErrorResponse();
        }
    } else {
        http_response_code(400);
        $jsonData = json_encode(\ProjectManager\Services\ConvertToJsonService::INVALID_TASK_ASSIGNED_TO_TASK);
    }
        echo $jsonData;
    } catch (Exception $e) {
        echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
    }


