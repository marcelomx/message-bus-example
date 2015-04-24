<?php
namespace App\Tests\Command;

use App\Command\NewPostMessage;

class NewPostMessageTest extends \PHPUnit_Framework_TestCase
{
    public function testNePostMessageCommand()
    {
        $message = 'Hello World';
        $author = 'foobar';
        $newPostMessage = new NewPostMessage($message, $author);
        $this->assertEquals($message, $newPostMessage->getMessage());
        $this->assertEquals($author, $newPostMessage->getAuthor());
    }
}