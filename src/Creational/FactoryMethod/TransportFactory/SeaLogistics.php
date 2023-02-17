<?php

namespace Patterns\Creational\FactoryMethod\TransportFactory;

class SeaLogistics extends Logistic
{

    function createTransport(): Transport
    {
        return new Ship();
    }
}