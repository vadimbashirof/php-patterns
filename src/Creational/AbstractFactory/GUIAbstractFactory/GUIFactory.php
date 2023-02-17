<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

/**
 * Абстрактная фабрика знает обо всех абстрактных типах продуктов.
 */
interface GUIFactory
{
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}