<?php

use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteFactory1;
use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteFactory2;
use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteProductA1;
use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteProductA2;
use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteProductB1;
use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteProductB2;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\MacButton;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\MacCheckbox;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\MacFactory;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\WinButton;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\WinCheckbox;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\WinFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function testProductFactory()
    {
        $winFactory = new WinFactory();
        $macFactory = new MacFactory();

        $this->assertInstanceOf(WinButton::class, $winFactory->createButton());
        $this->assertInstanceOf(WinCheckbox::class, $winFactory->createCheckbox());

        $this->assertInstanceOf(MacButton::class, $macFactory->createButton());
        $this->assertInstanceOf(MacCheckbox::class, $macFactory->createCheckbox());
    }

    public function testAbstractFactory()
    {
        $concreteFactory1 = new ConcreteFactory1();
        $concreteFactory2 = new ConcreteFactory2();

        $this->assertInstanceOf(ConcreteProductA1::class, $concreteFactory1->createProductA());
        $this->assertInstanceOf(ConcreteProductB1::class, $concreteFactory1->createProductB());

        $this->assertInstanceOf(ConcreteProductA2::class, $concreteFactory2->createProductA());
        $this->assertInstanceOf(ConcreteProductB2::class, $concreteFactory2->createProductB());
    }
}