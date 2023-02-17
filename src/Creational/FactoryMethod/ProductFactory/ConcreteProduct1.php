<?php

namespace Patterns\Creational\FactoryMethod\ProductFactory;

class ConcreteProduct1 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct1}\n";
    }
}