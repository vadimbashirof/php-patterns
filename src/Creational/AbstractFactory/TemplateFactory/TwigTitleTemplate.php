<?php

namespace Patterns\Creational\AbstractFactory\TemplateFactory;

/**
 * Этот Конкретный Продукт предоставляет шаблоны заголовков страниц Twig.
 */
class TwigTitleTemplate implements TitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1>{{ title }}</h1>";
    }
}
