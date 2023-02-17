<?php

namespace Patterns\Creational\FactoryMethod\ButtonFactory;

interface Button
{
    public function render();
    public function onClick();
}