<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

//try {

    $db = \ProjectManager\Services\DbConnector::connect();
    $data = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db, $_GET['project_id'], $_GET['user_id']);

    $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::TASK_SUCCESS_MESSAGE);
    echo $jsonData;
//    if (is_numeric(['project_id']) && ['project_id'] > 0 && is_numeric(['user_id']) && ['user_id'] > 0) {
//        $jsonData = \ProjectManager\Hydrators\TasksHydrator::getTasksByUserAndProjectId($db);
//    } else {
//        if (!is_numeric(['project_id']) || ['project_id'] <= 0) {
//            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
//        }
//        if (!is_numeric(['user_id']) || ['user_id'] <= 0) {
//            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidUserIdResponse();
//        }
//        if (['user_id'] != ['project_id']) {
//            $jsonData= \ProjectManager\Services\ConvertToJsonService::noTasksAssignedToUserErrorResponse();
//        }
//    }
//    echo $jsonData;
//}
//catch (Exception $e) {
//       echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
//  }
