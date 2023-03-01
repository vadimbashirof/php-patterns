<?php

use Patterns\Creational\Builder\CarBuilder\Manual;
use Patterns\Creational\Singleton\RealSingleton\Config;
use Patterns\Creational\Singleton\RealSingleton\Logger;
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

    public function testRealSingleton()
    {
        $l1 = Logger::getInstance();
        $l2 = Logger::getInstance();

        $this->assertInstanceOf(Singleton::class, $l1);
        $this->assertInstanceOf(Singleton::class, $l2);
        $this->assertSame($l1, $l2);

        $config1 = Config::getInstance();
        $config1->setValue("login", "test_login");
        $config1->setValue("password", "test_password");

        $config2 = Config::getInstance();

        $this->assertSame($config1, $config2);
        $this->assertSame($config1->getValue("login"), $config2->getValue("login"));
        $this->assertSame($config1->getValue("password"), $config2->getValue("password"));
    }
}