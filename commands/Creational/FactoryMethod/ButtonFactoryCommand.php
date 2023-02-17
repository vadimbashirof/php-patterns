<?php

namespace Commands\Creational\FactoryMethod;

use Patterns\Creational\FactoryMethod\ButtonFactory\DialogWeb;
use Patterns\Creational\FactoryMethod\ButtonFactory\DialogWindows;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ButtonFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('FactoryMethod:button');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dialogWeb = new DialogWeb();
        $dialogWin = new DialogWindows();

        $dialogWeb->render();
        echo "\n";
        $dialogWin->render();

        return Command::SUCCESS;
    }
}