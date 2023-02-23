<?php

namespace Patterns\Creational\Builder\CarBuilder;

class CarBuilder implements Builder
{
    private Car $car;

    public function reset()
    {
        $this->car = new Car;
    }

    public function setSeats()
    {
        // TODO: Implement setSeats() method.
    }

    public function setEngine(Engine $engine)
    {
        // TODO: Implement setEngine() method.
    }

    public function setTripComputer()
    {
        // TODO: Implement setTripComputer() method.
    }

    public function setGPS()
    {
        // TODO: Implement setGPS() method.
    }

    public function getResult(): Car
    {
        return $this->car;
    }
}