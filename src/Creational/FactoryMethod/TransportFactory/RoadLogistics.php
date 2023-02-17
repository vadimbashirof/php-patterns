<?php

namespace Patterns\Creational\FactoryMethod\TransportFactory;

class RoadLogistics extends Logistic
{

    function createTransport(): Transport
    {
        return new Truck();
    }
}