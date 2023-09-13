<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';
use \ProjectManager\Services\ConvertToJsonService;


$db = \ProjectManager\Services\DbConnector::connect();
$data = \ProjectManager\Hydrators\ProjectsHydrator::getProjects($db);
$jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data,ConvertToJsonService::PROJECTS_SUCCESS_MESSAGE);

echo $jsonData;

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    $data = \ProjectManager\Hydrators\ProjectsHydrator::getProjects($db);
    echo \ProjectManager\Services\ConvertToJsonService::convert($data,ConvertToJsonService::PROJECTS_SUCCESS_MESSAGE);
} catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}

