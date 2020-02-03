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
}