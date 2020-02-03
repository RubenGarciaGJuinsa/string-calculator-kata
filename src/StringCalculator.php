<?php


namespace Kata;


class StringCalculator
{
    protected static $timesCalled = 0;

    public static function add(string $numbers): int
    {
        static::$timesCalled++;

        $explodedNumbers = self::getNumbersFromString($numbers);
        $validNumbers = self::checkIfNumbersAreNegative($explodedNumbers);

        $result = array_sum($validNumbers);

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
        $validNumbers = [];
        $negativeNumbers = [];
        foreach ($explodedNumbers as $number) {
            if ($number < 0) {
                $negativeNumbers[] = $number;
            } else if ($number <= 1000) {
                $validNumbers[] = $number;
            }
        }
        if (!empty($negativeNumbers)) {
            throw new \Exception("negatives not allowed: ".implode(', ', $negativeNumbers));
        }

        return $validNumbers;
    }

    public static function getCalledCount()
    {
        return static::$timesCalled;
    }

    public static function unsetTimesCalled()
    {
        static::$timesCalled = 0;
    }
}