<?php

namespace Patterns\Creational\FactoryMethod\TransportFactory;

class Ship implements Transport
{

    public function deliver()
    {
        echo "Ship delivery\n";
    }
}