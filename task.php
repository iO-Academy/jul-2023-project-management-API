<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        $data = \ProjectManager\Hydrators\TasksHydrator::getTaskByTaskId($db, $_GET['id']);
        if ($data) {
            $jsonData =  \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::TASK_SUCCESS_MESSAGE);
        } else {
            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidTaskIdResponse();
        }
    } else {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidTaskIdResponse();
    }
    echo $jsonData;
} catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}