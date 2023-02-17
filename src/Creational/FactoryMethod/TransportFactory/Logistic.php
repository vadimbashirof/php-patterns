<?php

namespace Patterns\Creational\FactoryMethod\TransportFactory;

abstract class Logistic
{
    abstract function createTransport(): Transport;

    public function planDelivery(): void
    {
        $transport = $this->createTransport();
        echo "Create transport: " . static::class . "\n";
        $transport->deliver();
    }
}