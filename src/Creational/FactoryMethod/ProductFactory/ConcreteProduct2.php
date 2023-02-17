<?php

namespace Patterns\Creational\FactoryMethod\ProductFactory;

class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct2}\n";
    }
}