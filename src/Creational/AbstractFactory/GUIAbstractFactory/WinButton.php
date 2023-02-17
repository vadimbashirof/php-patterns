<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

/**
 * Семейства продуктов имеют те же вариации (macOS/Windows).
 */
class WinButton implements Button
{
    public function paint()
    {
        echo "Отрисовать кнопку в стиле Windows.\n";
    }
}