<?php

namespace Commands\Structural\Bridge;

use Patterns\Structural\Bridge\PageRender\HTMLRenderer;
use Patterns\Structural\Bridge\PageRender\JsonRenderer;
use Patterns\Structural\Bridge\PageRender\Page;
use Patterns\Structural\Bridge\PageRender\Product;
use Patterns\Structural\Bridge\PageRender\ProductPage;
use Patterns\Structural\Bridge\PageRender\SimplePage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class PageRenderCommand extends Command
{
    protected function configure()
    {
        $this->setName('PageRenderCommand');
    }

    /**
     * Клиентский код имеет дело только с объектами Абстракции.
     */
    private function clientCode(Page $page)
    {
        // ...

        echo $page->view();

        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        /**
         * Клиентский код может выполняться с любой предварительно сконфигурированной
         * комбинацией Абстракция+Реализация.
         */
        $HTMLRenderer = new HTMLRenderer();
        $JSONRenderer = new JsonRenderer();

        $page = new SimplePage(
            $HTMLRenderer,
            title: "Home",
            content: "Welcome to our website!"
        );
        echo "HTML view of a simple content page:\n";
        $this->clientCode($page);
        echo "\n\n";

        /**
         * При необходимости Абстракция может заменить связанную Реализацию во время
         * выполнения.
         */
        $page->changeRenderer($JSONRenderer);
        echo "JSON view of a simple content page, rendered with the same client code:\n";
        $this->clientCode($page);
        echo "\n\n";


        $product = new Product(
            id: "123",
            title: "Star Wars, episode1",
            description: "A long time ago in a galaxy far, far away...",
            image: "/images/star-wars.jpeg",
            price: 39.95
        );

        $page = new ProductPage($HTMLRenderer, $product);
        echo "HTML view of a product page, same client code:\n";
        $this->clientCode($page);
        echo "\n\n";

        $page->changeRenderer($JSONRenderer);
        echo "JSON view of a simple content page, with the same client code:\n";
        $this->clientCode($page);

        return Command::SUCCESS;
    }
}