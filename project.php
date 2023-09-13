<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    $projectId = $_GET['id'];
    $data = \ProjectManager\Hydrators\ProjectsHydrator::getProject($db, $projectId);
    if (isset($projectId)) {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::PROJECT_SUCCESS_MESSAGE);
    } else if (gettype($projectId) === "integer") {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
    }
    echo $jsonData;
} catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}