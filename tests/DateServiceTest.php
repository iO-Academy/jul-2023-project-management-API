<?php
use PHPUnit\Framework\TestCase;

class DateServiceTest extends TestCase
{
    public function testConvertToUkFormat_success()
    {
        $unformattedDate = '2024-03-08';
        $result = \ProjectManager\Services\DateService::convertToUkFormat($unformattedDate);
        $this->assertSame('08/03/2024', $result);
    }

    public function testConvertToUkFormat_malformed()
    {
        $this->expectException(TypeError::class);
        \ProjectManager\Services\DateService::convertToUkFormat([]);
    }

    public function testConvertToUkFormat_failure()
    {
        $this->expectException(Exception::class);
        \ProjectManager\Services\DateService::convertToUkFormat('2023-15-03');
    }
}
