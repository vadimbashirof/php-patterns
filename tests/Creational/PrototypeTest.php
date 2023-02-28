<?php

use Patterns\Creational\Prototype\PagePrototype\Author;
use Patterns\Creational\Prototype\PagePrototype\Page;
use Patterns\Creational\Prototype\PrototypeClone\ComponentWithBackReference;
use Patterns\Creational\Prototype\PrototypeClone\Prototype;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
    public function testPrototypeColone()
    {
        $p1 = new Prototype();
        $p1->primitive = 245;
        $p1->component = new \DateTime();
        $p1->circularReference = new ComponentWithBackReference($p1);

        $p2 = clone $p1;

        $this->assertSame($p1->primitive, $p2->primitive);
        $this->assertNotSame($p1->component, $p2->component);
        $this->assertNotSame($p1->circularReference, $p2->circularReference);
        $this->assertNotSame($p1->circularReference->prototype, $p2->circularReference->prototype);
    }

    public function testPagePrototype()
    {
        $author = new Author("John Smith");
        $page = new Page("Tip of the day", "Keep calm and carry on.", $author);
        $page->addComment("Nice tip, thanks!");
        $draft = clone $page;

        $this->assertInstanceOf(Page::class, $draft);
    }
}
