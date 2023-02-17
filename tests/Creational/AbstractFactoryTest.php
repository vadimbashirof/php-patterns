<?php

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
}