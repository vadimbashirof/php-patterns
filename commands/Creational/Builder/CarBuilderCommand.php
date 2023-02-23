<?php

namespace Commands\Creational\Builder;

use Patterns\Creational\Builder\CarBuilder\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CarBuilderCommand extends Command
{
    protected function configure()
    {
        $this->setName('CarBuilderCommand');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        Application::makeCar();

        return Command::SUCCESS;
    }
}