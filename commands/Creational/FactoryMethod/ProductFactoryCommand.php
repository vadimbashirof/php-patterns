<?php

namespace Commands\Creational\FactoryMethod;

use Patterns\Creational\FactoryMethod\ProductFactory\ConcreteCreator1;
use Patterns\Creational\FactoryMethod\ProductFactory\ConcreteCreator2;
use Patterns\Creational\FactoryMethod\ProductFactory\Creator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ProductFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('FactoryMethod:product');
    }

    private function clientCode(Creator $creator)
    {
        // ...
        echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $creator->someOperation();
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Приложение выбирает тип создателя в зависимости от конфигурации или среды.
         */
        echo "App: Launched with the ConcreteCreator1.\n";
        $this->clientCode(new ConcreteCreator1());
        echo "\n";

        echo "App: Launched with the ConcreteCreator2.\n";
        $this->clientCode(new ConcreteCreator2());

        return Command::SUCCESS;
    }
}