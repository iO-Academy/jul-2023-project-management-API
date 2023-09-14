<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
<<<<<<< HEAD
    $data = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db, $_GET['project_id'], $_GET['user_id']);

    $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::TASKS_SUCCESS_MESSAGE);
=======
    if (isset($_GET['project_id']) && ctype_digit($_GET['project_id']) && isset($_GET['user_id']) && ctype_digit($_GET['user_id'])) {
        $data = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db, $_GET['project_id'], $_GET['user_id']);
            if (empty($data)) {
                $jsonData = \ProjectManager\Services\ConvertToJsonService::noTasksAssignedToUserErrorResponse();
            } else {
                $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::TASKS_SUCCESS_MESSAGE);
            }
    } else if (!isset($_GET['project_id']) || !ctype_digit($_GET['project_id'])) {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
    } else if (!isset($_GET['user_id']) || !ctype_digit($_GET['user_id'])) {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidUserIdResponse();
    }
>>>>>>> story4_get_specific_task
    echo $jsonData;
} catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}
