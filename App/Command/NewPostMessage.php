<?php

namespace App\Command;

use SimpleBus\Message\Type\Command;

class NewPostMessage implements Command
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $author;

    /**
     * @param string $message
     * @param string $author
     */
    public function __construct($message, $author)
    {
        $this->message = $message;
        $this->author = $author;
    }
    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}