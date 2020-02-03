<?php


namespace Kata;


class StringCalculator
{
    public static function add(string $numbers): int
    {
        $explodedNumbers = preg_split('/(,|\n)/', $numbers);
        $result = array_sum($explodedNumbers);

        return $result;
    }
}