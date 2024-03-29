<?php


namespace Kata;


class StringCalculator
{
    protected static $timesCalled = 0;

    public static function add(string $numbers): int
    {
        static::$timesCalled++;

        $explodedNumbers = self::getNumbersFromString($numbers);
        self::checkIfNumbersAreNegative($explodedNumbers);
        $validNumbers = self::filterBiggerNumbers($explodedNumbers);

        $result = array_sum($validNumbers);

        return $result;
    }

    /**
     * @param string $numbers
     * @return array
     */
    protected static function getNumbersFromString(string $numbers): array
    {
        $specifiedDelimiter = '';

        preg_match('/^(?:\\/\\/(.*)\\n)?((.|\\n)+)/', $numbers, $matches);

        if ( ! empty($matches[1])) {
            $specifiedDelimiter = $matches[1];
        }

        if ( ! empty($matches[2])) {
            $numbers = $matches[2];
        }

        if (empty($specifiedDelimiter)) {
            return preg_split('/(,|\n)/', $numbers);
        }

        return static::splitBySpecifiedDelimiter($numbers, $specifiedDelimiter);
    }

    protected static function splitBySpecifiedDelimiter($numbers, $specifiedDelimiter)
    {
        preg_match('/^(?:\\[(.*)\\])|(.){1}$/', $specifiedDelimiter, $matches);

        $delimiter = '';
        if (!empty($matches[1])) {
             $delimiter = $matches[1];
        }

        if (!empty($matches[2])) {
            $delimiter = $matches[2];
        }

        return explode($delimiter, $numbers);
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

    protected static function filterBiggerNumbers(array $explodedNumbers)
    {
        $validNumbers = [];

        foreach ($explodedNumbers as $number) {
            if ($number <= 1000) {
                $validNumbers[] = $number;
            }
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