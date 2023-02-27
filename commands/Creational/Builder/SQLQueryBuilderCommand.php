<?php

namespace Commands\Creational\Builder;

use Patterns\Creational\Builder\CarBuilder\Application;
use Patterns\Creational\Builder\SQLQueryBuilder\MysqlQueryBuilder;
use Patterns\Creational\Builder\SQLQueryBuilder\PostgresQueryBuilder;
use Patterns\Creational\Builder\SQLQueryBuilder\SQLQueryBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SQLQueryBuilderCommand extends Command
{
    protected function configure()
    {
        $this->setName('SQLQueryBuilderCommand');
    }


    /**
     * Обратите внимание, что клиентский код непосредственно использует объект
     * строителя. Назначенный класс Директора в этом случае не нужен, потому что
     * клиентский код практически всегда нуждается в различных запросах, поэтому
     * последовательность шагов конструирования непросто повторно использовать.
     *
     * Поскольку все наши строители запросов создают продукты одного типа (это
     * строка), мы можем взаимодействовать со всеми строителями, используя их общий
     * интерфейс. Позднее, если мы реализуем новый класс Строителя, мы сможем
     * передать его экземпляр существующему клиентскому коду, не нарушая его,
     * благодаря интерфейсу SQLQueryBuilder.
     */
    private function clientCode(SQLQueryBuilder $queryBuilder)
    {
        $query = $queryBuilder
            ->select("users", ["name", "email", "password"])
            ->where("age", 18, ">")
            ->where("age", 30, "<")
            ->limit(10, 20)
            ->getSQL();

        echo $query;

        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Приложение выбирает подходящий тип строителя запроса в зависимости от текущей
         * конфигурации или настроек среды.
         */
        // if ($_ENV['database_type'] == 'postgres') {
        //     $builder = new PostgresQueryBuilder(); } else {
        //     $builder = new MysqlQueryBuilder(); }
        //
        // clientCode($builder);


        echo "Testing MySQL query builder:\n";
        $this->clientCode(new MysqlQueryBuilder());

        echo "\n\n";

        echo "Testing PostgresSQL query builder:\n";
        $this->clientCode(new PostgresQueryBuilder());

        echo "\n";

        return Command::SUCCESS;
    }
}