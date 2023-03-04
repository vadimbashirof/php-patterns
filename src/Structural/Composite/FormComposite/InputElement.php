<?php

namespace Patterns\Structural\Composite\FormComposite;

class InputElement implements Renderable
{
    public function render(): string
    {
        return '<input type="text" />';
    }
}