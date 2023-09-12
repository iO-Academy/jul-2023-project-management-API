<?php
namespace ProjectManager\Services;
class ConvertToJsonService
{

    private static array $successResponse = [
        'message' => '',
        'data' => []
    ];
    public const PROJECTS_URL = 0;
    private const MESSAGES = [
        self::PROJECTS_URL => 'Successfully retrieved projects'
    ];
    private const UNEXPECTED_ERROR_RESPONSE = [
        "message" => "Unexpected error",
        "data" => []
    ];

    public static function convert(array $data, int $message)
    {
        self::$successResponse['message'] = self::MESSAGES[$message];
        self::$successResponse['data'] = $data;
        $json = json_encode(self::$successResponse);

        if ($json){
            http_response_code(200);
            return $json;
        } else {
            http_response_code(500);
            return json_encode(self::UNEXPECTED_ERROR_RESPONSE);
        }
    }
}