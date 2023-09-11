<?php
header('Content-Type: application/json; charset=utf-8');
require 'vendor/autoload.php';

\ProjectManager\Services\ConvertToJsonService::convert($data);