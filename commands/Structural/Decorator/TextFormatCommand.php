<?php

namespace Commands\Structural\Decorator;

use Patterns\Structural\Decorator\TextFormat\DangerousHTMLTagsFilter;
use Patterns\Structural\Decorator\TextFormat\InputFormat;
use Patterns\Structural\Decorator\TextFormat\MarkdownFormat;
use Patterns\Structural\Decorator\TextFormat\PlainTextFilter;
use Patterns\Structural\Decorator\TextFormat\TextInput;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class TextFormatCommand extends Command
{
    protected function configure()
    {
        $this->setName('TextFormatCommand');
    }

    /**
     * Клиентский код может быть частью реального веб-сайта, который отображает
     * создаваемый пользователями контент. Поскольку он работает с модулями
     * форматирования через интерфейс компонента, ему всё равно, получает ли он
     * простой объект компонента или обёрнутый.
     */
    private function displayCommentAsAWebsite(InputFormat $format, string $text)
    {
        // ..

        echo $format->formatText($text);

        // ..
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        /**
         * Модули форматирования пользовательского ввода очень удобны при работе с
         * контентом, создаваемым пользователями. Отображение такого контента «как есть»
         * может быть очень опасным, особенно когда его могут создавать анонимные
         * пользователи (например, комментарии). Ваш сайт не только рискует получить
         * массу спам-ссылок, но также может быть подвергнут XSS-атакам.
         */
        $dangerousComment = <<<HERE
        Hello! Nice blog post!
        Please visit my <a href='http://www.iwillhackyou.com'>homepage</a>.
        <script src="http://www.iwillhackyou.com/script.js">
          performXSSAttack();
        </script>
        HERE;

        /**
         * Наивное отображение комментариев (небезопасное).
         */
        $naiveInput = new TextInput();
        echo "Website renders comments without filtering (unsafe):\n";
        $this->displayCommentAsAWebsite($naiveInput, $dangerousComment);
        echo "\n\n\n";

        /**
         * Отфильтрованное отображение комментариев (безопасное).
         */
        $filteredInput = new PlainTextFilter($naiveInput);
        echo "Website renders comments after stripping all tags (safe):\n";
        $this->displayCommentAsAWebsite($filteredInput, $dangerousComment);
        echo "\n\n\n";


        /**
         * Декоратор позволяет складывать несколько входных форматов для получения
         * точного контроля над отображаемым содержимым.
         */
        $dangerousForumPost = <<<HERE
        # Welcome
        
        This is my first post on this **gorgeous** forum.
        
        <script src="http://www.iwillhackyou.com/script.js">
          performXSSAttack();
        </script>
        HERE;

        /**
         * Наивное отображение сообщений (небезопасное, без форматирования).
         */
        $naiveInput = new TextInput();
        echo "Website renders a forum post without filtering and formatting (unsafe, ugly):\n";
        $this->displayCommentAsAWebsite($naiveInput, $dangerousForumPost);
        echo "\n\n\n";

        /**
         * Форматтер Markdown + фильтрация опасных тегов (безопасно, красиво).
         */
        $text = new TextInput();
        $markdown = new MarkdownFormat($text);
        $filteredInput = new DangerousHTMLTagsFilter($markdown);
        echo "Website renders a forum post after translating markdown markup" .
            " and filtering some dangerous HTML tags and attributes (safe, pretty):\n";
        $this->displayCommentAsAWebsite($filteredInput, $dangerousForumPost);
        echo "\n\n\n";

        return Command::SUCCESS;
    }
}