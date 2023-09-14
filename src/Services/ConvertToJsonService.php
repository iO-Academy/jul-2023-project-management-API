<?php
namespace ProjectManager\Services;

class ConvertToJsonService
{
    private static array $successResponse = [
        'message' => '',
        'data' => []
    ];
    public const PROJECTS_SUCCESS_MESSAGE = 0;

    public const PROJECT_SUCCESS_MESSAGE = 1;

    public const TASKS_SUCCESS_MESSAGE = 2;

    public const TASK_SUCCESS_MESSAGE = 3;

    private const SUCCESS_MESSAGES = [
        self::PROJECTS_SUCCESS_MESSAGE => 'Successfully retrieved projects',
        self::PROJECT_SUCCESS_MESSAGE => 'Successfully retrieved project',
        self::TASKS_SUCCESS_MESSAGE => 'Successfully retrieved tasks',
        self::TASK_SUCCESS_MESSAGE => 'Successfully retrieved task'
    ];

    private const UNEXPECTED_ERROR_RESPONSE = [
        "message" => "Unexpected error",
        "data" => []
    ];

    private const INVALID_PROJECT_ID_RESPONSE = [
        "message" => "Invalid project ID",
        "data" => []
    ];

    private const INVALID_USER_ID_RESPONSE = [
        "message" => "Invalid user ID",
        "data" => []
    ];

    private const NO_TASK_ASSIGNED_TO_USER = [
        "message" => "No tasks assigned to that user for this project",
        "data" => []
    ];

    public const INVALID_TASK_ID_RESPONSE = [
        "message" => "Invalid task ID",
        "data" => []
    ];

    public static function convert(array | object $data, int $message): string
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

    public static function noTasksAssignedToUserErrorResponse(): string
    {
        http_response_code(404);
        return json_encode(self::NO_TASK_ASSIGNED_TO_USER);
}

    public static function invalidProjectIdResponse(): string
    {
        http_response_code(400);
        return json_encode(self::INVALID_PROJECT_ID_RESPONSE);
    }

    public static function invalidUserIdResponse(): string
    {
        http_response_code(400);
        return json_encode(self::INVALID_USER_ID_RESPONSE);
    }

    public static function invalidTaskIdResponse(): string
    {
        http_response_code(400);
        return json_encode(self::INVALID_TASK_ID_RESPONSE);
    }
}

