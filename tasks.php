<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    if (isset($_GET['project_id']) && ctype_digit($_GET['project_id']) && isset($_GET['user_id']) && ctype_digit($_GET['user_id'])) {
        $data = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db, $_GET['project_id'], $_GET['user_id']);
            if (empty($data)) {
                $jsonData = \ProjectManager\Services\ConvertToJsonService::noTasksAssignedToUserErrorResponse();
                echo $jsonData;
            } else {
                $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::TASK_SUCCESS_MESSAGE);
                echo $jsonData;
            }
    } else if ((!$_GET['project_id'] || !ctype_digit($_GET['project_id']) && (!$_GET['user_id'] || !ctype_digit($_GET['user_id'])))) {
        echo \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
        echo \ProjectManager\Services\ConvertToJsonService::invalidUserIdResponse();
    } else if (!$_GET['project_id'] || !ctype_digit($_GET['project_id'])) {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
        echo $jsonData;
    } else if (!$_GET['user_id'] || !ctype_digit($_GET['user_id'])) {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidUserIdResponse();
        echo $jsonData;
    }

} catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}
