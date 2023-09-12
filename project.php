<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

$db = \ProjectManager\Services\DbConnector::connect();
$projectId = 3; //this is just for testing code during S2T4
$data = \ProjectManager\Hydrators\ProjectsHydrator::getProject($db, $projectId);
if ($projectId) {
    $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::PROJECTS_SUCCESS_MESSAGE);
} else {
    http_response_code(400);
    $jsonData = json_encode(\ProjectManager\Services\ConvertToJsonService::INVALID_PROJECT_ID_RESPONSE);
}
echo $jsonData;