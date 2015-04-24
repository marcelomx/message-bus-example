<?php

namespace App\Listener;

use SimpleBus\Message\Message;
use SimpleBus\Message\Subscriber\MessageSubscriber;

class EmailMessagePostedConfirmation implements MessageSubscriber
{
    public function notify(Message $message)
    {
        $post = $message->getPost();

        echo 'Notifying ' . $post->getId() . ' by email' . PHP_EOL;
    }
}