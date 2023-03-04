<?php

namespace Commands\Structural\Decorator;

use Patterns\Structural\Decorator\Conceptual\Component;
use Patterns\Structural\Decorator\Conceptual\ConcreteComponent;
use Patterns\Structural\Decorator\Conceptual\ConcreteDecoratorA;
use Patterns\Structural\Decorator\Conceptual\ConcreteDecoratorB;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DecoratorConceptualCommand extends Command
{
    protected function configure()
    {
        $this->setName('DecoratorConceptualCommand');
    }


    /**
     * Клиентский код работает со всеми объектами, используя интерфейс Компонента.
     * Таким образом, он остаётся независимым от конкретных классов компонентов, с
     * которыми работает.
     */
    private function clientCode(Component $component)
    {
        // ...

        echo "RESULT: " . $component->operation();

        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Таким образом, клиентский код может поддерживать как простые компоненты...
         */
        $simple = new ConcreteComponent();
        echo "Client: I've got a simple component:\n";
        $this->clientCode($simple);
        echo "\n\n";

        /**
         * ...так и декорированные.
         *
         * Обратите внимание, что декораторы могут обёртывать не только простые
         * компоненты, но и другие декораторы.
         */
        $decorator1 = new ConcreteDecoratorA($simple);
        $decorator2 = new ConcreteDecoratorB($decorator1);
        echo "Client: Now I've got a decorated component:\n";
        $this->clientCode($decorator2);

        echo "\n";

        return Command::SUCCESS;
    }
}