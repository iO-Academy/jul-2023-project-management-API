<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';

$db = \ProjectManager\Services\DbConnector::connect();
$data = \ProjectManager\Hydrators\TasksHydrator::getTaskByUserAndProjectId($db, $_GET['id']);
echo \ProjectManager\Services\ConvertToJsonService::convert($data, \ProjectManager\Services\ConvertToJsonService::TASK_SUCCESS_MESSAGE);