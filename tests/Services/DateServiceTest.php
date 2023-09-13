<?php
use ProjectManager\Services\DateService;
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

    public function testIsOverdue_success_true()
    {
        $date = '01/01/1970';
        $result = \ProjectManager\Services\DateService::isOverdue($date);
        $this->assertSame(true, $result);
    }

    public function testIsOverdue_success_false()
    {
        $date = '01/01/3000';
        $result = \ProjectManager\Services\DateService::isOverdue($date);
        $this->assertSame(false, $result);
    }

    public function testIsOverdue_malformed()
    {
        $this->expectException(TypeError::class);
        \ProjectManager\Services\DateService::isOverdue([]);
    }

    public function testIsOverdue_failure()
    {
        $this->expectException(Exception::class);
        \ProjectManager\Services\DateService::isOverdue('2023-15-03');
    }
}