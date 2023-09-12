<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';
use \ProjectManager\Services\ConvertToJsonService;

try {
    $db = \ProjectManager\Services\DbConnector::connect();
} catch (Exception $e) {
    http_response_code(500);
    json_encode(ConvertToJsonService::UNEXPECTED_ERROR_RESPONSE);
}
try {
    $data = \ProjectManager\Hydrators\ProjectsHydrator::getProjects($db);
} catch (Exception $e) {
    http_response_code(500);
    json_encode(ConvertToJsonService::UNEXPECTED_ERROR_RESPONSE);
}
echo $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data,ConvertToJsonService::PROJECTS_SUCCESS_MESSAGE);

