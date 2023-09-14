<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        try {
            $data = \ProjectManager\Hydrators\ProjectsHydrator::getProject($db, $_GET['id']);
            $jsonData =  \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::PROJECT_SUCCESS_MESSAGE);
        } catch (Throwable $e) {
            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
        }
    } else {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
    }
    echo $jsonData;
}
 catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}