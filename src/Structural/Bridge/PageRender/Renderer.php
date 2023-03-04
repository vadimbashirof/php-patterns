<?php

namespace Patterns\Structural\Bridge\PageRender;

/**
 * Реализация объявляет набор «реальных», «под капотом», «платформенных»
 * методов.
 *
 * В этом случае Реализация перечисляет методы рендеринга, которые используются
 * для создания веб-страниц. Разные Абстракции могут использовать разные методы
 * Реализации.
 */
interface Renderer
{
    public function renderTitle(string $title): string;

    public function renderTextBlock(string $text): string;

    public function renderImage(string $url): string;

    public function renderLink(string $url, string $title): string;

    public function renderHeader(): string;

    public function renderFooter(): string;

    public function renderParts(array $parts): string;
}