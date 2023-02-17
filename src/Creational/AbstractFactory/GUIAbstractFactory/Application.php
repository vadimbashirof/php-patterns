<?php

namespace Patterns\Creational\AbstractFactory\GUIAbstractFactory;

/**
 * Для кода, использующего фабрику, не важно, с какой конкретно
 * фабрикой он работает. Все получатели продуктов работают с
 * ними через общие интерфейсы.
 */
class Application
{
    private GUIFactory $factory;
    private Button $button;
    private Checkbox $checkbox;

    public function __construct(GUIFactory $factory)
    {
        $this->factory = $factory;
    }

    public function createUI()
    {
        $this->button = $this->factory->createButton();
        $this->checkbox = $this->factory->createCheckbox();
    }

    public function paint()
    {
        $this->button->paint();
        $this->checkbox->paint();
    }
}