<?php
header('Content-Type: application/json; charset=utf-8');
require 'vendor/autoload.php';
use \ProjectManager\Services\ConvertToJsonService;

echo ConvertToJsonService::convert([NAN], 1);
$db = \ProjectManager\Services\DbConnector::connect();
\ProjectManager\Services\ConvertToJsonService::convert($data);

