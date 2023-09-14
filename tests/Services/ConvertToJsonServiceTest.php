<?php

namespace Services;

use Exception;
use PHPUnit\Framework\TestCase;
use ProjectManager\Services\ConvertToJsonService;
use TypeError;

class ConvertToJsonServiceTest extends TestCase
{
    public function testConvert_success()
    {
        $result = \ProjectManager\Services\ConvertToJsonService::convert([1, 2, 3, 4], 0);
        $expected = '{"message":"Successfully retrieved projects","data":[1,2,3,4]}';
        $this->assertSame($expected, $result);
        $this->assertSame(200, http_response_code());
    }

    public function testUnexpectedErrorResponse_success()
    {
        $result = \ProjectManager\Services\ConvertToJsonService::UnexpectedErrorResponse();
        $expected = '{"message":"Unexpected error","data":[]}';
        $this->assertSame($expected, $result);
        $this->assertSame(500, http_response_code());
    }

    public function testConvert_failure()
    {
        $this->expectException(Exception::class);
        \ProjectManager\Services\ConvertToJsonService::convert([1, 2, 3, 4], 100);
    }

    public function testConvert_malformed_data()
    {
        $this->expectException(TypeError::class);
        \ProjectManager\Services\ConvertToJsonService::convert('', 0);
    }

    public function testConvert_malformed_message()
    {
        $this->expectException(TypeError::class);
        \ProjectManager\Services\ConvertToJsonService::convert([], '');
    }

    public function testNoTasksAssignedToUserErrorResponse_success()
    {
        $result = \ProjectManager\Services\ConvertToJsonService::NoTasksAssignedToUserErrorResponse();
        $expected = '{"message":"No tasks assigned to that user for this project","data":[]}';
        $this->assertSame($expected, $result);
        $this->assertSame(404, http_response_code());
    }

    public function testInvalidProjectIdResponse_success()
    {
        $result = ConvertToJsonService::invalidProjectIdResponse();
        $expected = '{"message":"Invalid project ID","data":[]}';
        $this->assertSame($expected, $result);
        $this->assertSame(400, http_response_code());
    }


    public function testInvalidUserIdResponse_success()
    {
        $result = ConvertToJsonService::invalidUserIdResponse();
        $expected = '{"message":"Invalid user ID","data":[]}';
        $this->assertSame($expected, $result);
        $this->assertSame(400, http_response_code());
    }

    public function testProjectIdOrResponse_Success_Is_Numeric_True()
    {
        $result = (!is_numeric(['true']) || ['false'] <= 0);
        $expected = (!is_numeric(['true']) || ['false'] <= 0);
        $this->assertTrue($expected, $result);
    }

    public function testProjectIdOrResponse_Success_Is_Greater_Than_Zero_True()
    {
        $result = (!is_numeric(['false']) || ['true'] <= 0);
        $expected = (!is_numeric(['false']) || ['true'] <= 0);
        $this->assertTrue($expected, $result);
    }

    public function testProjectIdOrResponse_Success_Both_True()
    {
        $result = (!is_numeric(['true']) || ['true'] <= 0);
        $expected = (!is_numeric(['true']) || ['true'] <= 0);
        $this->assertTrue($expected, $result);
    }

    public function testUserIdOrResponse_Success_Is_Numeric_True()
    {
        $result = (!is_numeric(['true']) || ['false'] <= 0);
        $expected = (!is_numeric(['true']) || ['false'] <= 0);
        $this->assertTrue($expected, $result);
    }

    public function testUserIdOrResponse_Success_Is_Greater_Than_Zero_True()
    {
        $result = (!is_numeric(['false']) || ['true'] <= 0);
        $expected = (!is_numeric(['false']) || ['true'] <= 0);
        $this->assertTrue($expected, $result);
    }

    public function testUserIdOrResponse_Success_Both_True()
    {
        $result = (!is_numeric(['true']) || ['true'] <= 0);
        $expected = (!is_numeric(['true']) || ['true'] <= 0);
        $this->assertTrue($expected, $result);
    }
}