<?php


namespace Kata;


class StringCalculator
{
    public static function add(string $numbers): int
    {
        $explodedNumbers = explode(',', $numbers);
        $result = array_sum($explodedNumbers);

        return $result;
    }
}