<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        try {
            $data = \ProjectManager\Hydrators\TasksHydrator::getTaskByUserAndProjectId($db, $_GET['id']);
            $jsonData =  \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::PROJECT_SUCCESS_MESSAGE);
        } catch (Throwable $e) {
//            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidTaskIdResponse();
        }
    } else {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidTaskIdResponse();
    }
    echo $jsonData;
} catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}
