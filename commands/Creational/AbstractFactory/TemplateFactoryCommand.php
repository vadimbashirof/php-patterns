<?php

namespace Commands\Creational\AbstractFactory;

use Patterns\Creational\AbstractFactory\TemplateFactory\Page;
use Patterns\Creational\AbstractFactory\TemplateFactory\PHPTemplateFactory;
use Patterns\Creational\AbstractFactory\TemplateFactory\TwigTemplateFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class TemplateFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('TemplateFactoryCommand');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Теперь в других частях приложения клиентский код может принимать фабричные
         * объекты любого типа.
         */
        $page = new Page('Sample page', 'This is the body.');

        echo "Testing actual rendering with the PHPTemplate factory:\n";
        echo $page->render(new PHPTemplateFactory());
        echo "\n";

        return Command::SUCCESS;
    }
}