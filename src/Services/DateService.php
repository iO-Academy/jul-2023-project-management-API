<?php

namespace ProjectManager\Services;

class DateService
{
    public static function isOverdue(string $date): bool
    {
        $deadline = new \DateTimeImmutable($date);
        $currentDate = new \DateTimeImmutable();
        $dateDifference = $deadline->diff($currentDate);
        return !$dateDifference->invert;
    }
}