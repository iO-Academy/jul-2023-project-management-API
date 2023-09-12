<?php
namespace ProjectManager\Services;

class ConvertToJsonService
{

    private static array $successResponse = [
        'message' => '',
        'data' => []
    ];
    public const PROJECTS_SUCCESS_MESSAGE = 0;
    private const SUCCESS_MESSAGES = [
        self::PROJECTS_SUCCESS_MESSAGE => 'Successfully retrieved projects'
    ];
    private const UNEXPECTED_ERROR_RESPONSE = [
        "message" => "Unexpected error",
        "data" => []
    ];

    public static function convert(array $data, int $message)
    {
        if (!array_key_exists($message, self::SUCCESS_MESSAGES)) {
            throw new \Exception('Wrong message key inserted');
        }
        self::$successResponse['message'] = self::SUCCESS_MESSAGES[$message];
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

//f  public const PROJECTS_URL = 0;
//    private const MESSAGES = [
//        self::PROJECTS_URL => 'Successfully retrieved projects'
//    ];
//SO messages are meant to be as an array in order to select the message based on the type of error