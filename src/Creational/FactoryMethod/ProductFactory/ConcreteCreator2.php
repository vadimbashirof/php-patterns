<?php

namespace Patterns\Creational\FactoryMethod\ProductFactory;

class ConcreteCreator2 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct2();
    }
}