<?php

namespace Commands\Creational\FactoryMethod;

use Patterns\Creational\FactoryMethod\SocialConnectorFactory\FacebookPoster;
use Patterns\Creational\FactoryMethod\SocialConnectorFactory\LinkedInPoster;
use Patterns\Creational\FactoryMethod\SocialConnectorFactory\SocialNetworkPoster;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SocialConnectorFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('SocialConnectorFactoryCommand');
    }

    /**
     * Клиентский код может работать с любым подклассом SocialNetworkPoster, так как
     * он не зависит от конкретных классов.
     */
    private function clientCode(SocialNetworkPoster $creator)
    {
        // ...
        $creator->post("Hello world!");
        $creator->post("I had a large hamburger this morning!");
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        /**
         * На этапе инициализации приложение может выбрать, с какой социальной сетью оно
         * хочет работать, создать объект соответствующего подкласса и передать его
         * клиентскому коду.
         */
        echo "Testing ConcreteCreator1:\n";
        $this->clientCode(new FacebookPoster("john_smith", "******"));
        echo "\n\n";

        echo "Testing ConcreteCreator2:\n";
        $this->clientCode(new LinkedInPoster("john_smith@example.com", "******"));

        return Command::SUCCESS;
    }
}