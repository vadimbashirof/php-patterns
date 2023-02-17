<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

/**
 *
 *(Button/Checkbox). Продукты одного семейства должны иметь
 * общий интерфейс.
 */
interface Button
{
    public function paint();
}