<?php
/**
 * Created by PhpStorm.
 * User: marcelo
 * Date: 21/04/15
 * Time: 16:47
 */

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Post;

class PostTest extends \PHPUnit_Framework_TestCase
{
    public function testPostMessage()
    {
        $message = 'Hellow';
        $author = 'foo@bar';
        $post = Post::postNew($message, $author);
        $this->assertInstanceOf('AppBundle\Entity\Post', $post);
        $this->assertInstanceOf('SimpleBus\Message\Recorder\RecordsMessages', $post);
        $this->assertEquals($message, $post->getMessage());
        $this->assertEquals($author, $post->getAuthor());

        $this->assertEquals(1, count($post->recordedMessages()));
        $this->assertInstanceOf('App\Event\MessagePosted', $post->recordedMessages()[0]);
    }
}