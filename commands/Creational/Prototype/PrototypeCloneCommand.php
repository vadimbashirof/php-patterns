<?php

namespace Commands\Creational\Prototype;

use Patterns\Creational\Prototype\PrototypeClone\ComponentWithBackReference;
use Patterns\Creational\Prototype\PrototypeClone\Prototype;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class PrototypeCloneCommand extends Command
{
    protected function configure()
    {
        $this->setName('PrototypeCloneCommand');
    }

    /**
     * Клиентский код.
     */
    private function clientCode()
    {
        $p1 = new Prototype();
        $p1->primitive = 245;
        $p1->component = new \DateTime();
        $p1->circularReference = new ComponentWithBackReference($p1);

        $p2 = clone $p1;

        if ($p1->primitive === $p2->primitive) {
            echo "Primitive field values have been carried over to a clone. Yay!\n";
        } else {
            echo "Primitive field values have not been copied. Booo!\n";
        }

        if ($p1->component === $p2->component) {
            echo "Simple component has not been cloned. Booo!\n";
        } else {
            echo "Simple component has been cloned. Yay!\n";
        }

        if ($p1->circularReference === $p2->circularReference) {
            echo "Component with back reference has not been cloned. Booo!\n";
        } else {
            echo "Component with back reference has been cloned. Yay!\n";
        }

        if ($p1->circularReference->prototype === $p2->circularReference->prototype) {
            echo "Component with back reference is linked to original object. Booo!\n";
        } else {
            echo "Component with back reference is linked to the clone. Yay!\n";
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->clientCode();

        return Command::SUCCESS;
    }
}