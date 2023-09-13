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
        \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
    }
        echo $jsonData;
    } catch (Exception $e) {
        echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
    }


