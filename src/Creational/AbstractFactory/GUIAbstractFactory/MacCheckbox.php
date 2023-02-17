<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

class MacCheckbox implements Checkbox
{
    public function paint()
    {
        echo "Отрисовать чекбокс в стиле macOS.\n";
    }
}