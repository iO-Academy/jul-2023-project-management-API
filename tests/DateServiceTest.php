<?php
use PHPUnit\Framework\TestCase;

class DateServiceTest extends TestCase
{
    public function testConvertToToUkFormat()
    {
        $example = new \ProjectManager\Services\DateService();
        $result = $example->convertToToUkFormat('2024-03-08');
        $this->assertSame('08/03/2024', $result);
    }

    public function testMalformedConvertToToUkFormat()
    {
        $this->expectException(TypeError::class);
        \ProjectManager\Services\DateService::convertToToUkFormat([]);
    }

    public function testFailedConvertToToUkFormat()
    {
        $this->expectException(Exception::class);
        \ProjectManager\Services\DateService::convertToToUkFormat('2023-15-03');
    }
}
