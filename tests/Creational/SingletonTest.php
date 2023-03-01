<?php


use Patterns\Creational\Builder\CarBuilder\Manual;
use Patterns\Creational\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testSingleton()
    {
        $s1 = Singleton::getInstance();
        $s2 = Singleton::getInstance();

        $this->assertInstanceOf(Singleton::class, $s1);
        $this->assertInstanceOf(Singleton::class, $s2);
        $this->assertSame($s1, $s2);
    }
}