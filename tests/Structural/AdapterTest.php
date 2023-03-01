<?php

use Patterns\Structural\Adapter\Conceptual\Adaptee;
use Patterns\Structural\Adapter\Conceptual\Adapter;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    public function testAdapterConceptual()
    {
        $adaptee = new Adaptee();
        $adapter = new Adapter($adaptee);

        $this->assertSame("Adapter: (TRANSLATED) Special behavior of the Adaptee.", $adapter->request());
    }
}