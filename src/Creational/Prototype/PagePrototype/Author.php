<?php

namespace Patterns\Creational\Prototype\PagePrototype;

class Author
{
    private string $name;

    /**
     * @var Page[]
     */
    private array $pages = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addToPage(Page $page): void
    {
        $this->pages[] = $page;
    }
}