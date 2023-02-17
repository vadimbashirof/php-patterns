<?php

namespace Patterns\Creational\FactoryMethod\ButtonFactory;

class DialogWeb extends Dialog
{

    function createButton(): Button
    {
        return new HtmlButton();
    }
}