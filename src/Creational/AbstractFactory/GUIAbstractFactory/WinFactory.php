<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

/**
 * Каждая конкретная фабрика знает и создаёт только продукты
 * своей вариации.
 */
class WinFactory implements  GUIFactory
{
    public function createButton(): Button
    {
        return new WinButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new WinCheckbox();
    }
}