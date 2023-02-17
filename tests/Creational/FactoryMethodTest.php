<?php

use Patterns\Creational\FactoryMethod\ButtonFactory\DialogWeb;
use Patterns\Creational\FactoryMethod\ButtonFactory\DialogWindows;
use Patterns\Creational\FactoryMethod\ButtonFactory\HtmlButton;
use Patterns\Creational\FactoryMethod\ButtonFactory\WindowsButton;
use Patterns\Creational\FactoryMethod\ProductFactory\ConcreteCreator1;
use Patterns\Creational\FactoryMethod\ProductFactory\ConcreteCreator2;
use Patterns\Creational\FactoryMethod\ProductFactory\ConcreteProduct1;
use Patterns\Creational\FactoryMethod\ProductFactory\ConcreteProduct2;
use Patterns\Creational\FactoryMethod\SocialConnectorFactory\FacebookConnector;
use Patterns\Creational\FactoryMethod\SocialConnectorFactory\FacebookPoster;
use Patterns\Creational\FactoryMethod\SocialConnectorFactory\LinkedInConnector;
use Patterns\Creational\FactoryMethod\SocialConnectorFactory\LinkedInPoster;
use Patterns\Creational\FactoryMethod\TransportFactory\RoadLogistics;
use Patterns\Creational\FactoryMethod\TransportFactory\SeaLogistics;
use Patterns\Creational\FactoryMethod\TransportFactory\Ship;
use Patterns\Creational\FactoryMethod\TransportFactory\Truck;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testProductFactory()
    {
        $creator1 = new ConcreteCreator1();
        $creator2 = new ConcreteCreator2();

        $this->assertInstanceOf(ConcreteProduct1::class, $creator1->factoryMethod());
        $this->assertInstanceOf(ConcreteProduct2::class, $creator2->factoryMethod());
    }

    public function testButtonFactory()
    {
        $dialogWeb = new DialogWeb();
        $dialogWin = new DialogWindows();

        $this->assertInstanceOf(HtmlButton::class, $dialogWeb->createButton());
        $this->assertInstanceOf(WindowsButton::class, $dialogWin->createButton());
    }

    public function testTransportFactory()
    {
        $roadLogistic = new RoadLogistics();
        $seaLogistic = new SeaLogistics();

        $this->assertInstanceOf(Truck::class, $roadLogistic->createTransport());
        $this->assertInstanceOf(Ship::class, $seaLogistic->createTransport());
    }

    public function testSocialConnectorFactory()
    {
        $facebookPoster = new FacebookPoster("john_smith", "******");
        $linkedinPoster = new LinkedInPoster("john_smith@example.com", "******");

        $this->assertInstanceOf(FacebookConnector::class, $facebookPoster->getSocialNetwork());
        $this->assertInstanceOf(LinkedInConnector::class, $linkedinPoster->getSocialNetwork());
    }
}