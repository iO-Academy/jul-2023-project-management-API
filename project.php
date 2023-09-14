<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

try {
    $db = \ProjectManager\Services\DbConnector::connect();
    $projectId = $_GET['id'];
        if (isset($projectId) && is_numeric($projectId)) {
            try{
                $data = \ProjectManager\Hydrators\ProjectsHydrator::getProject($db, $projectId);
                $jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::PROJECT_SUCCESS_MESSAGE);
                echo $jsonData;
            } catch (Throwable $e) {
                $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
                echo $jsonData;
            }
        }
//        else if (!is_numeric([$projectId]) || [$projectId] < 0) {
//            $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
//            echo $jsonData;
//        }
        else {
        $jsonData = \ProjectManager\Services\ConvertToJsonService::invalidProjectIdResponse();
        }
        echo $jsonData;
    }
 catch (Exception $e) {
    echo \ProjectManager\Services\ConvertToJsonService::unexpectedErrorResponse();
}