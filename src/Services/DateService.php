<?php
namespace ProjectManager\Services;

class DateService
{
    private const DATEFORMAT ='d/m/Y';
    public static function isOverdue(string $date): bool
    {
        $deadline = new \DateTimeImmutable($date);
        $currentDate = new \DateTimeImmutable();
        return !($deadline->diff($currentDate)->invert);
    }

    public static function convertToUkFormat(string $unformattedDate): string
    {
        $date = new \DateTimeImmutable($unformattedDate);
        return $date->format(DateService::DATEFORMAT);
    }
}