<?php

namespace Patterns\Creational\FactoryMethod\ButtonFactory;

class DialogWindows extends Dialog
{

    function createButton(): Button
    {
        return new WindowsButton();
    }
}