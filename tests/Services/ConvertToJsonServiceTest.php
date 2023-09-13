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

    public function testConvert_success_unexpected_error()
    {
        $this->markTestSkipped('Skipping due to integration test required');
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

    public function testNoTasksAssignedToThatUserErrorResponse_success()
    {
        $result = \ProjectManager\Services\ConvertToJsonService::NoTasksAssignedToThatUserErrorResponse();
        $expected = '{"message":"No tasks assigned to that user for this project","data":[]}';
        $this->assertSame($expected, $result);
        $this->assertSame(404, http_response_code());
}