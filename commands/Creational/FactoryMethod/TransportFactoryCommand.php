<?php

namespace Commands\Creational\FactoryMethod;

use Patterns\Creational\FactoryMethod\TransportFactory\RoadLogistics;
use Patterns\Creational\FactoryMethod\TransportFactory\SeaLogistics;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class TransportFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('TransportFactoryCommand');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $roadLogistic = new RoadLogistics();
        $seaLogistic = new SeaLogistics();

        $roadLogistic->planDelivery();
        echo "\n";
        $seaLogistic->planDelivery();

        return Command::SUCCESS;
    }
}