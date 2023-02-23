<?php

namespace Patterns\Creational\Builder\CarBuilder;

class Director
{
    public function constructSportsCar(Builder $builder)
    {
        $builder->reset();
        $builder->setSeats(2);
        $builder->setEngine(new Engine());
        $builder->setTripComputer(true);
        $builder->setGPS(true);
    }
}