<?php

namespace Patterns\Creational\FactoryMethod\ButtonFactory;

final class HtmlButton implements Button
{

    public function render()
    {
        echo "Render html button \n";
    }

    public function onClick()
    {
        echo "Click html button \n";
    }
}