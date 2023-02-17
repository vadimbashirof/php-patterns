<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

class WinCheckbox implements Checkbox
{
    public function paint()
    {
        echo "Отрисовать чекбокс в стиле Windows.\n";
    }
}