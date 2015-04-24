<?php
namespace App\Event;

use AppBundle\Entity\Post;
use SimpleBus\Message\Type\Event;

class MessagePosted implements Event
{
    /**
     * @var string
     */
    protected $post;

    /**
     * @param $post
     */
    function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return string
     */
    public function getPost()
    {
        return $this->post;
    }
}