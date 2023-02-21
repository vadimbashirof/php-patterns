<?php

namespace Patterns\Creational\AbstractFactory\TemplateFactory;

/**
 * Это еще один тип Абстрактного Продукта, который описывает шаблоны целых
 * страниц.
 */
interface PageTemplate
{
    public function getTemplateString(): string;
}