<?php

namespace Patterns\Creational\Builder\CarBuilder;

class CarManualBuilder implements Builder
{

    private Manual $manual;

    public function reset()
    {
        $this->manual = new Manual();
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

    public function getResult(): Manual
    {
        return $this->manual;
    }
}