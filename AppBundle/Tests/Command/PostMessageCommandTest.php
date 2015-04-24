<?php
/**
 * Created by PhpStorm.
 * User: marcelo
 * Date: 21/04/15
 * Time: 15:51
 */

namespace AppBundle\Tests\Command;

use AppBundle\Command\PostMessageCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

class PostMessageCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldExecuteCommand()
    {
        $commandBus = $this->getMock('SimpleBus\Message\Bus\MessageBus');
        $commandBus
            ->expects($this->once())
            ->method('handle')
            ->with($this->containsOnlyInstancesOf('App\Command\NewPostMessage'));

        $container = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $container
            ->expects($this->any())
            ->method('get')
            ->with('command_bus')
            ->will($this->returnValue($commandBus));

        $command = new PostMessageCommand();
        $command->setContainer($container);

        $args = array('message' => 'Foo', 'author' => 'me');
        $command->run(new ArrayInput($args), new NullOutput());
    }
}