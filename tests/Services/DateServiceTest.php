<?php

namespace Services;

use ProjectManager\Services\DateService;
use PHPUnit\Framework\TestCase;

class DateServiceTest extends TestCase
{
    public function testIsOverdue_success_true()
    {
        $date = '01/01/1970';
        $result = DateService::isOverdue($date);
        $this->assertSame(true, $result);
    }

    public function testIsOverdue_success_false()
    {
        $date = '01/01/3000';
        $result = DateService::isOverdue($date);
        $this->assertSame(false, $result);
    }

    public function testIsOverdue_malformed()
    {
        $this->expectException(\TypeError::class);
        DateService::isOverdue([]);
    }

    public function testIsOverdue_failure()
    {
        $this->expectException(\Exception::class);
        \ProjectManager\Services\DateService::isOverdue('2023-15-03');
    }
}