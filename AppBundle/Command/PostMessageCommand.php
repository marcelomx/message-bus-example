<?php
/**
 * Created by PhpStorm.
 * User: marcelo
 * Date: 21/04/15
 * Time: 15:42
 */

namespace AppBundle\Command;

use App\Command\NewPostMessage;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PostMessageCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:post-message')
            ->setDescription('Post a new message')
            ->addArgument('message', InputArgument::REQUIRED, 'The message')
            ->addArgument('author', InputArgument::REQUIRED, 'The message author email')
//            ->addOption('is-admin', null, InputOption::VALUE_NONE, 'If set, the user is created as an administrator')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = $input->getArgument('message');
        $author  = $input->getArgument('author');

        $command = new NewPostMessage($message, $author);
        $this->getCommandBus()->handle($command);

        $output->writeln('Message posted...');
    }

    /**
     * @return \SimpleBus\Message\Bus\MessageBus
     */
    protected function getCommandBus()
    {
        return $this->getContainer()->get('command_bus');
    }
}