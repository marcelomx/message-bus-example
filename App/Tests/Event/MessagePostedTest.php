<?php
/**
 * Created by PhpStorm.
 * User: marcelo
 * Date: 21/04/15
 * Time: 15:11
 */

namespace App\Tests\Event;

use App\Event\MessagePosted;
use AppBundle\Entity\Post;

class MessagePostedTest extends \PHPUnit_Framework_TestCase
{
    public function testNewMessagePostedEvent()
    {
        $post = new Post();
        $event = new MessagePosted($post);
        $this->assertInstanceOf('App\Event\MessagePosted', $event);
        $this->assertInstanceOf('SimpleBus\Message\Type\Event', $event);
        $this->assertEquals($post, $event->getPost());
    }
}