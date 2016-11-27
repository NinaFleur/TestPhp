<?php

use PHPUnit\Framework\TestCase;
use Tools\Text;

/**
 * Class MyStackTest
 */
class ApplicationTest extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack) - 1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

    /**
     * @return bool
     */
    public function testMyText()
    {
        $text = new Text();
        $this->assertEquals('MyString', $text::camelize('my_string'));

        return true;
    }

    public function testru2lat()
    {
        $text = new Text();
        $testData = [
            'khome' => 'хоме',
            'test'  => 'тест"'
        ];

        foreach ($testData as $expected => $actual) {
            $this->assertEquals($expected, $text::ru2lat($actual));
        }
    }
}