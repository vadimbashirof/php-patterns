<?php

namespace Patterns\Creational\AbstractFactory\TemplateFactory;

/**
 * Отрисовщик шаблонов Twig.
 */
class TwigRenderer implements TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        return \Twig::render($templateString, $arguments);
    }
}