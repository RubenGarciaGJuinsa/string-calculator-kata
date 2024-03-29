<?php
namespace Test;

use Kata\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    public function
    tearDown()
    {
        StringCalculator::unsetTimesCalled();
    }

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

    /** @test */
    public function
    pass_ten_numbers_and_get_the_sum()
    {
        $this->assertEquals(55, StringCalculator::add('1,2,3,4,5,6,7,8,9,10'));
    }

    /** @test */
    public function
    pass_comma_as_separator()
    {
        $this->assertEquals(6, StringCalculator::add("1\n2,3"));
    }

    /** @test */
    public function
    pass_separator_in_number_string()
    {
        $this->assertEquals(3, StringCalculator::add("//;\n1;2"));
    }

    /** @test */
    public function
    pass_negative_number_expect_exception()
    {
        $this->expectExceptionMessage('negatives not allowed: -1');
        StringCalculator::add("1,4,-1");
        $this->fail('Not exception thrown');
    }

    /** @test */
    public function
    pass_two_negative_numbers_expect_exception()
    {
        $this->expectExceptionMessage('negatives not allowed: -1, -2');
        StringCalculator::add("1,4,-1,-2");
        $this->fail('Not exception thrown');
    }

    /** @test */
    public function
    get_zero_times_called_add_method()
    {
        $this->assertEquals('0', StringCalculator::getCalledCount());
    }

    /** @test */
    public function
    get_one_time_called_add_method()
    {
        StringCalculator::add("1,4");
        $this->assertEquals('1', StringCalculator::getCalledCount());
    }

    /** @test */
    public function
    get_two_time_called_add_method()
    {
        StringCalculator::add("1,4");
        StringCalculator::add("1,4");
        $this->assertEquals('2', StringCalculator::getCalledCount());
    }

    /** @test */
    public function
    pass_more_than_one_thousand_number()
    {
        $this->assertEquals(2, StringCalculator::add("2,1001"));
    }

    /** @test */
    public function
    any_length_delimiters()
    {
        $this->assertEquals(6, StringCalculator::add("//[***]\n1***2***3"));
    }

    /** @test */
    public function
    multiple_delimiters()
    {
        $this->assertEquals(6, StringCalculator::add("//[*][%]\n1*2%3"));
    }
}