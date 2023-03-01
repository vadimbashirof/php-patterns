<?php

namespace Commands\Structural\Adapter;

use Patterns\Structural\Adapter\Notification\EmailNotification;
use Patterns\Structural\Adapter\Notification\Notification;
use Patterns\Structural\Adapter\Notification\SlackApi;
use Patterns\Structural\Adapter\Notification\SlackNotification;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class NotificationAdapterCommand extends Command
{
    protected function configure()
    {
        $this->setName('NotificationAdapterCommand');
    }

    /**
     * Клиентский код работает с классами, которые следуют Целевому интерфейсу.
     */
    public function clientCode(Notification $notification)
    {
        // ...

        echo $notification->send("Website is down!",
            "<strong style='color:red;font-size: 50px;'>Alert!</strong> " .
            "Our website is not responding. Call admins and bring it up!");

        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Client code is designed correctly and works with email notifications:\n";
        $notification = new EmailNotification("developers@example.com");
        $this->clientCode($notification);
        echo "\n\n";

        echo "The same client code can work with other classes via adapter:\n";
        $slackApi = new SlackApi("example.com", "XXXXXXXX");
        $notification = new SlackNotification($slackApi, "Example.com Developers");
        $this->clientCode($notification);

        return Command::SUCCESS;
    }
}