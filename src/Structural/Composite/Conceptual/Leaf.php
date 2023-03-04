<?php

namespace Patterns\Structural\Composite\Conceptual;

/**
 * Класс Лист представляет собой конечные объекты структуры. Лист не может иметь
 * вложенных компонентов.
 *
 * Обычно объекты Листьев выполняют фактическую работу, тогда как объекты
 * Контейнера лишь делегируют работу своим подкомпонентам.
 */
class Leaf extends Component
{
    public function operation(): string
    {
        return "Leaf";
    }
}