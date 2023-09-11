<?php
namespace ProjectManager\Services;
class ConvertToJsonService
{
    public static function convert(array $data):string
    {
        return json_encode($data);

        //below is for task 5
//        if(json_encode($data)) {
//            return http_response_code(200);
//        } else {
//            return http_response_code(400);
//        }
    }
}