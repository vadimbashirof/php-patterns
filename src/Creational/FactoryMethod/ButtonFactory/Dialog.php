<?php

namespace Patterns\Creational\FactoryMethod\ButtonFactory;

abstract class Dialog
{
    public function render(): void
    {
        $button = $this->createButton();
        echo "Create button: " . static::class . "\n";
        $button->onClick();
        $button->render();
    }

    abstract function createButton(): Button;
}