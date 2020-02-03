<?php


namespace Kata;


class StringCalculator
{
    public static function add(string $numbers): int
    {
        $splitChars = ',|\n';

        preg_match('/^(\\/\\/(.)+\\n)?((.|\\n)+)/', $numbers, $matches);
        if ( ! empty($matches[2])) {
            $splitChars .= '|'.$matches[2];
        }
        if ( ! empty($matches[3])) {
            $numbers = $matches[3];
        }

        $explodedNumbers = preg_split('/('.$splitChars.')/', $numbers);
        $result = array_sum($explodedNumbers);

        return $result;
    }
}