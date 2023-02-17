<?php

namespace Patterns\Creational\FactoryMethod\ButtonFactory;

final class WindowsButton implements Button
{

    public function render()
    {
        echo "Click windows button \n";
    }

    public function onClick()
    {
        echo "Click windows button \n";
    }
}