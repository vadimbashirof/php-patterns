<?php

namespace Commands\Creational\Prototype;


use Patterns\Creational\Prototype\PagePrototype\Author;
use Patterns\Creational\Prototype\PagePrototype\Page;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class PagePrototypeCommand extends Command
{
    protected function configure()
    {
        $this->setName('PagePrototypeCommand');
    }

    /**
     * Клиентский код.
     */
    private function clientCode()
    {
        $author = new Author("John Smith");
        $page = new Page("Tip of the day", "Keep calm and carry on.", $author);

        // ...

        $page->addComment("Nice tip, thanks!");

        // ...

        $draft = clone $page;
        echo "Dump of the clone. Note that the author is now referencing two objects.\n\n";
        print_r($draft);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->clientCode();

        return Command::SUCCESS;
    }
}