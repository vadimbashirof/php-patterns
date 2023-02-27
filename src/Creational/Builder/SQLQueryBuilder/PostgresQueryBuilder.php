<?php

namespace Patterns\Creational\Builder\SQLQueryBuilder;

/**
 * Этот Конкретный Строитель совместим с PostgreSQL. Хотя Postgres очень похож
 * на Mysql, в нем всё же есть ряд отличий. Чтобы повторно использовать общий
 * код, мы расширяем его от строителя MySQL, переопределяя некоторые шаги
 * построения.
 */
class PostgresQueryBuilder extends MysqlQueryBuilder
{
    /**
     * Помимо прочего, PostgreSQL имеет несколько иной синтаксис LIMIT.
     */
    public function limit(int $start, int $offset): SQLQueryBuilder
    {
        parent::limit($start, $offset);

        $this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;

        return $this;
    }

    // + тонны других переопределений...
}