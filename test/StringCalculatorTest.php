<?php
namespace Test;

use Kata\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    public function
    pass_empty_string_get_0()
    {
        $this->assertEquals(0, StringCalculator::add(''));
    }

    /** @test */
    public function
    pass_one_number_and_get_that_number()
    {
        $this->assertEquals(1, StringCalculator::add('1'));
        $this->assertEquals(2, StringCalculator::add('2'));
    }

    /** @test */
    public function
    pass_two_numbers_and_get_the_sum()
    {
        $this->assertEquals(3, StringCalculator::add('1,2'));
        $this->assertEquals(12, StringCalculator::add('4,8'));
    }
}