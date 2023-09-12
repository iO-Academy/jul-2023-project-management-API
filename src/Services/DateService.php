<?php

namespace ProjectManager\Services;

class DateService
{
    public static function isOverdue(string $date): bool
    {
        $deadline = new \DateTime($date);
        $currentDate = new \DateTime();

        $diff = $deadline->diff($currentDate);

        if ($diff->invert) {
            return true;
        } else {
            return false;
        }
    }
}