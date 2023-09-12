<?php

namespace Services;

use ProjectManager\Services\DateService;
use PHPUnit\Framework\TestCase;

class DateServiceTest extends TestCase
{
    public function testIsOverdueTrueSuccess()
    {
        $date = '01/01/1970';
        $result = DateService::isOverdue($date);

        $this->assertSame(true, $result);
    }

    public function testIsOverdueFalseSuccess()
    {
        $date = '01/01/3000';
        $result = DateService::isOverdue($date);

        $this->assertSame(false, $result);
    }
}
