<?php

namespace Commands\Structural\Bridge;

use Patterns\Structural\Bridge\Conceptual\Abstraction;
use Patterns\Structural\Bridge\Conceptual\ConcreteImplementationA;
use Patterns\Structural\Bridge\Conceptual\ConcreteImplementationB;
use Patterns\Structural\Bridge\Conceptual\ExtendedAbstraction;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class BridgeConceptualCommand extends Command
{
    protected function configure()
    {
        $this->setName('BridgeConceptualCommand');
    }

    /**
     * За исключением этапа инициализации, когда объект Абстракции связывается с
     * определённым объектом Реализации, клиентский код должен зависеть только от
     * класса Абстракции. Таким образом, клиентский код может поддерживать любую
     * комбинацию абстракции и реализации.
     */
    private function clientCode(Abstraction $abstraction)
    {
        // ...

        echo $abstraction->operation();

        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Клиентский код должен работать с любой предварительно сконфигурированной
         * комбинацией абстракции и реализации.
         */
        $implementation = new ConcreteImplementationA();
        $abstraction = new Abstraction($implementation);
        $this->clientCode($abstraction);

        echo "\n";

        $implementation = new ConcreteImplementationB();
        $abstraction = new ExtendedAbstraction($implementation);
        $this->clientCode($abstraction);

        return Command::SUCCESS;
    }
}