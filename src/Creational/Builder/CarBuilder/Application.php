<?php

namespace Patterns\Creational\Builder\CarBuilder;

class Application
{
    public static function makeCar()
    {
        $director = new Director();

        $builder = new CarBuilder();
        $director->constructSportsCar($builder);
        $car = $builder->getResult();

        print_r($car);

        $builder = new CarManualBuilder();
        $director->constructSportsCar($builder);
        $manual = $builder->getResult();

        print_r($manual);
    }
}