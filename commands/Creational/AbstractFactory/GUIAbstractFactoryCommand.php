<?php

namespace Commands\Creational\AbstractFactory;

use Patterns\Creational\AbstractFactory\GUIAbstractFactory\Application;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\MacFactory;
use Patterns\Creational\AbstractFactory\GUIAbstractFactory\WinFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GUIAbstractFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('AbstractFactory:GUI');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $winFactory = new WinFactory();
        $macFactory = new MacFactory();

        $winApp = new Application($winFactory);
        $macApp = new Application($macFactory);

        $winApp->createUI();
        $winApp->paint();
        echo "\n";
        $macApp->createUI();
        $macApp->paint();

        return Command::SUCCESS;
    }
}