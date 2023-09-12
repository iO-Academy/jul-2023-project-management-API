<?php
header('Content-Type: application/json; charset=utf-8');
require 'vendor/autoload.php';

$db = \ProjectManager\Services\DbConnector::connect();

\ProjectManager\Services\ConvertToJsonService::convert($data);