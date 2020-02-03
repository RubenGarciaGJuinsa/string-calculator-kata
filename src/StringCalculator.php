<?php


namespace Kata;


class StringCalculator
{
    public static function add(string $numbers): int
    {
        $explodedNumbers = self::getNumbersFromString($numbers);
        foreach ($explodedNumbers as $number) {
            self::checkIfNumberIsNegative($number);
        }
        $result = array_sum($explodedNumbers);

        return $result;
    }

    /**
     * @param string $numbers
     * @return array
     */
    protected static function getNumbersFromString(string $numbers): array
    {
        $splitChars = ',|\n';

        preg_match('/^(\\/\\/(.)+\\n)?((.|\\n)+)/', $numbers, $matches);
        if ( ! empty($matches[2])) {
            $splitChars .= '|'.$matches[2];
        }
        if ( ! empty($matches[3])) {
            $numbers = $matches[3];
        }

        return preg_split('/('.$splitChars.')/', $numbers);
    }

    /**
     * @param $number
     * @throws \Exception
     */
    protected static function checkIfNumberIsNegative($number)
    {
        if ($number < 0) {
            throw new \Exception("negatives not allowed: ".$number);
        }
    }
}