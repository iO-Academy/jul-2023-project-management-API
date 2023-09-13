<?php
namespace ProjectManager\Services;

class ConvertToJsonService
{
    private static array $successResponse = [
        'message' => '',
        'data' => []
    ];
    public const PROJECTS_SUCCESS_MESSAGE = 0; //this is the key for the array?

    public const PROJECT_SUCCESS_MESSAGE = 1;
    private const SUCCESS_MESSAGES = [
        self::PROJECTS_SUCCESS_MESSAGE => 'Successfully retrieved projects',
        self::PROJECT_SUCCESS_MESSAGE => 'Successfully retrieved project'
    ];
    private const UNEXPECTED_ERROR_RESPONSE = [
        "message" => "Unexpected error",
        "data" => []
    ];

    public const INVALID_PROJECT_ID_RESPONSE = [
        "message" => "Invalid project ID",
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
            $json = self::unexpectedErrorResponse();
        }
        return $json;
    }

    public static function unexpectedErrorResponse(): string
    {
        http_response_code(500);
        return json_encode(self::UNEXPECTED_ERROR_RESPONSE);
    }
}
