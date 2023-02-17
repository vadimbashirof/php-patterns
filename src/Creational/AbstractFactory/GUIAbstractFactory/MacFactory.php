<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

/**
 * Несмотря на то, что фабрики оперируют конкретными классами,
 * их методы возвращают абстрактные типы продуктов. Благодаря
 * этому фабрики можно взаимозаменять, не изменяя клиентский
 * код.
 */
class MacFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new MacButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new MacCheckbox();
    }
}