<?php

namespace Commands\Structural\Adapter;

use Patterns\Structural\Adapter\Conceptual\Adaptee;
use Patterns\Structural\Adapter\Conceptual\Adapter;
use Patterns\Structural\Adapter\Conceptual\Target;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class AdapterConceptualCommand extends Command
{
    protected function configure()
    {
        $this->setName('AdapterConceptualCommand');
    }

    /**
     * Клиентский код.
     */
    private function clientCode(Target $target)
    {
        echo $target->request();
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Client: I can work just fine with the Target objects:\n";
        $target = new Target();
        $this->clientCode($target);
        echo "\n\n";

        $adaptee = new Adaptee();
        echo "Client: The Adaptee class has a weird interface. See, I don't understand it:\n";
        echo "Adaptee: " . $adaptee->specificRequest();
        echo "\n\n";

        echo "Client: But I can work with it via the Adapter:\n";
        $adapter = new Adapter($adaptee);
        $this->clientCode($adapter);
        echo "\n";

        return Command::SUCCESS;
    }
}