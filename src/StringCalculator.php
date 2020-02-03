<?php


namespace Kata;


class StringCalculator
{
    public static function add(string $numbers): int
    {
        $explodedNumbers = self::getNumbersFromString($numbers);
        self::checkIfNumbersAreNegative($explodedNumbers);

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
    protected static function checkIfNumbersAreNegative($explodedNumbers)
    {
        $negativeNumbers = [];
        foreach ($explodedNumbers as $number) {
            if ($number < 0) {
                $negativeNumbers[] = $number;
            }
        }
        if (!empty($negativeNumbers)) {
            throw new \Exception("negatives not allowed: ".implode(', ', $negativeNumbers));
        }
    }

    public static function getCalledCount()
    {

    }
}