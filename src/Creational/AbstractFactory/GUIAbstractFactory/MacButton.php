<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

class MacButton implements Button
{
    public function paint()
    {
        echo "Отрисовать кнопку в стиле macOS.\n";
    }
}