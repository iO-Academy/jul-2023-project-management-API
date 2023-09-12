<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';
use \ProjectManager\Services\ConvertToJsonService;

<<<<<<< HEAD
echo ConvertToJsonService::convert([], ConvertToJsonService::PROJECTS_SUCCESS_MESSAGE);
$db = \ProjectManager\Services\DbConnector::connect();

=======
$db = \ProjectManager\Services\DbConnector::connect();
$data = \ProjectManager\Hydrators\ProjectsHydrator::getProjects($db);
$jsonData = \ProjectManager\Services\ConvertToJsonService::convert($data, ConvertToJsonService::PROJECTS_URL);
>>>>>>> 86db27cc296b060b518510083e61a3590458e3d2

echo $jsonData;
