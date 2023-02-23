<?php

namespace Patterns\Creational\Builder\CarBuilder;

/**
 * Интерфейс строителя объявляет все возможные
 * этапы и шаги конфигурации продукта.
 */
interface Builder
{
    public function reset();
    public function setSeats();
    public function setEngine(Engine $engine);
    public function setTripComputer();
    public function setGPS();
}