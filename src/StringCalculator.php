<?php


namespace Kata;


class StringCalculator
{
    public static function add(string $numbers): int
    {
        $result = 0;
        $explodedNumbers = explode(',', $numbers);
        $result = array_sum($explodedNumbers);

        return $result;
    }
}