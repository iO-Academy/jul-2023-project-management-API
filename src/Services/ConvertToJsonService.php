<?php
namespace ProjectManager\Services;
class ConvertToJsonService
{
    public static function convert(array $data):string
    {
        if(json_encode($data)) {
            return http_response_code(200);
        } else {
            return http_response_code(400);
        }
    }
}