<?php

namespace Commands\Structural\Composite;

use Patterns\Structural\Composite\FormComposite\Form;
use Patterns\Structural\Composite\FormComposite\InputElement;
use Patterns\Structural\Composite\FormComposite\TextElement;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class FormCompositeCommand extends Command
{
    protected function configure()
    {
        $this->setName('FormCompositeCommand');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $form = new Form();
        $form->addElement(new TextElement('Email:'));
        $form->addElement(new InputElement());
        $embed = new Form();
        $embed->addElement(new TextElement('Password:'));
        $embed->addElement(new InputElement());
        $form->addElement($embed);

        echo $form->render();
        echo "\n";

        return Command::SUCCESS;
    }
}