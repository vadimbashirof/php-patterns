<?php

use Patterns\Creational\Builder\CarBuilder\Car;
use Patterns\Creational\Builder\CarBuilder\CarBuilder;
use Patterns\Creational\Builder\CarBuilder\CarManualBuilder;
use Patterns\Creational\Builder\CarBuilder\Director;
use Patterns\Creational\Builder\CarBuilder\Manual;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public function testCarBuilder()
    {
        $director = new Director();

        $carBuilder = new CarBuilder();
        $director->constructSportsCar($carBuilder);

        $manualBuilder = new CarManualBuilder();
        $director->constructSportsCar($manualBuilder);

        $this->assertInstanceOf(Car::class, $carBuilder->getResult());
        $this->assertInstanceOf(Manual::class, $manualBuilder->getResult());
    }
}