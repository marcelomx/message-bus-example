<?php

namespace App\Listener;

use SimpleBus\Message\Message;
use SimpleBus\Message\Subscriber\MessageSubscriber;

class MessagePostedListener implements MessageSubscriber
{
    /**
     * @param Message $message
     */
    public function notify(Message $message)
    {
        $post = $message->getPost();

        echo 'Ok. New posted created with ID: ' . $post->getId() . PHP_EOL;
    }
}