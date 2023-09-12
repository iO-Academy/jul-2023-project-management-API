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
    public const UNEXPECTED_ERROR_RESPONSE = [
        "message" => "Unexpected error",
        "data" => []
    ];

    public static function convert(array $data, int $message): string
    {
        if (!array_key_exists($message, self::SUCCESS_MESSAGES)) {
            throw new \Exception('Wrong message key inserted');
        }
        self::$successResponse['message'] = self::SUCCESS_MESSAGES[$message];
        self::$successResponse['data'] = $data;
        $json = json_encode(self::$successResponse);

        if ($json){
            http_response_code(200);
        } else {
            http_response_code(500);
            $json = json_encode(self::UNEXPECTED_ERROR_RESPONSE);
        }
        return $json;
    }
}
