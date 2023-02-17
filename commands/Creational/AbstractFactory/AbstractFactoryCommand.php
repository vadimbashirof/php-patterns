<?php

namespace Commands\Creational\AbstractFactory;

use Patterns\Creational\AbstractFactory\AbstractFactory\AbstractFactory;
use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteFactory1;
use Patterns\Creational\AbstractFactory\AbstractFactory\ConcreteFactory2;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class AbstractFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('AbstractFactoryCommand');
    }

    /**
     * Клиентский код работает с фабриками и продуктами только через абстрактные
     * типы: Абстрактная Фабрика и Абстрактный Продукт. Это позволяет передавать
     * любой подкласс фабрики или продукта клиентскому коду, не нарушая его.
     */
    private function clientCode(AbstractFactory $factory)
    {
        $productA = $factory->createProductA();
        $productB = $factory->createProductB();

        echo $productB->usefulFunctionB() . "\n";
        echo $productB->anotherUsefulFunctionB($productA) . "\n";
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Клиентский код может работать с любым конкретным классом фабрики.
         */
        echo "Client: Testing client code with the first factory type:\n";
        $this->clientCode(new ConcreteFactory1());

        echo "\n";

        echo "Client: Testing the same client code with the second factory type:\n";
        $this->clientCode(new ConcreteFactory2());

        return Command::SUCCESS;
    }
}