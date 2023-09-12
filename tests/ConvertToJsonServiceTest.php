<?php
use PHPUnit\Framework\TestCase;

class ConvertToJsonServiceTest extends TestCase
{
    public  function testConvert_success()
    {
        $result = \ProjectManager\Services\ConvertToJsonService::convert([1,2,3,4],0);
        $expected = '{"message":"Successfully retrieved projects","data":[1,2,3,4]}';
        $this->assertSame($expected,$result);
    }
    public  function testConvert_success_unexpected_error()
    {
        $result = \ProjectManager\Services\ConvertToJsonService::convert([NAN],0);
        $expected = '{"message":"Unexpected error","data":[]}';
        $this->assertSame($expected,$result);
    }

    public  function testConvert_failure()
    {
        $this->expectException(Exception::class);
        \ProjectManager\Services\ConvertToJsonService::convert([1,2,3,4],100);
    }

    public function testConvert_malformed_data()
    {
        $this->expectException(TypeError::class);
        \ProjectManager\Services\ConvertToJsonService::convert('',0);
    }

    public function testConvert_malformed_message()
    {
        $this->expectException(TypeError::class);
        \ProjectManager\Services\ConvertToJsonService::convert([],'');
    }
}