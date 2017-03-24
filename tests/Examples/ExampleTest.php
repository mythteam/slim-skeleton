<?php

namespace App\Tests\Examples;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testEmpty()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));
        
        return $stack;
    }
    
    /**
     * @depends testEmpty
     *
     * @param array $stack
     *
     * @return array
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        self::assertEquals('foo', $stack[count($stack) - 1]);
        self::assertNotEmpty($stack);
        
        return $stack;
    }
    
    /**
     * @param array $stack
     *
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        self::assertEquals('foo', array_pop($stack));
        self::assertEmpty($stack);
    }
    
    /**
     * @dataProvider dataProvider
     *
     * @param int $a
     * @param int $b
     * @param int $expected
     */
    public function testDataProvider($a, $b, $expected)
    {
        self::assertEquals($expected, $a + $b);
    }
    
    /**
     * @expectedException \Exception
     * @expectedExceptionCode 1
     * @expectedExceptionMessage exception
     */
    public function testException()
    {
        throw new \Exception('exception', 1);
    }
    public function dataProvider()
    {
        return [
            'one' => [1, 1, 2],
            'two' => [2, 2, 4],
        ];
    }
}
