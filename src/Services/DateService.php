<?php
namespace ProjectManager\Services;

class DateService
{

    public static function convertToUkFormat(string $unformattedDate): string
    {
        $date = new \DateTimeImmutable($unformattedDate);
        return $date->format('d/m/Y');
    }
}
