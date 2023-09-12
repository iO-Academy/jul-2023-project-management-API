<?php
header('Content-Type: application/json; charset=utf-8');
require 'vendor/autoload.php';
use \ProjectManager\Services\ConvertToJsonService;

echo ConvertToJsonService::convert([], ConvertToJsonService::PROJECTS_SUCCESS_MESSAGE);
$db = \ProjectManager\Services\DbConnector::connect();


