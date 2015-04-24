<?php

namespace App\Tests\Handler;

use App\Command\NewPostMessage;
use App\Handler\PostMessageHandler;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class PostMessageHandlerTest extends TestCase
{
    public function testHandleNewPostMessage()
    {
        $entityManager = $this->getMock('Doctrine\ORM\EntityManagerInterface');
        $entityManager
            ->expects($this->any())
            ->method('persist')
            ->with($this->containsOnlyInstancesOf('AppBundle\Entity\Post'));

        $entityManager
            ->expects($this->any())
            ->method('flush');

        $handler = new PostMessageHandler($entityManager);
        $message = new NewPostMessage('Hello World', 'me');
        $handler->handle($message);
    }
}