<?php
header('Content-Type: application/json; charset=utf-8');
require 'vendor/autoload.php';
use \ProjectManager\Services\ConvertToJsonService;

//$db = \ProjectManager\Services\DbConnector::connect();

echo ConvertToJsonService::convert([1,2,3,4], ConvertToJsonService::PROJECTS_URL);
