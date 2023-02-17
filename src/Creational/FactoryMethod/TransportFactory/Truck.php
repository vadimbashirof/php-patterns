<?php

namespace Patterns\Creational\FactoryMethod\TransportFactory;

class Truck implements Transport
{

    public function deliver()
    {
        echo "Truck delivery\n";
    }
}