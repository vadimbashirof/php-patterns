<?php

namespace Commands\Creational\Singleton;

use Patterns\Creational\Singleton\Singleton;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SingletonCommand extends Command
{
    protected function configure()
    {
        $this->setName('SingletonCommand');
    }

    /**
     * Клиентский код.
     */
    public function clientCode()
    {
        $s1 = Singleton::getInstance();
        $s2 = Singleton::getInstance();
        if ($s1 === $s2) {
            echo "Singleton works, both variables contain the same instance.";
        } else {
            echo "Singleton failed, variables contain different instances.";
        }
        echo "\n";
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->clientCode();

        return Command::SUCCESS;
    }
}