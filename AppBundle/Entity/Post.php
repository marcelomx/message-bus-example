<?php

namespace AppBundle\Entity;

use App\Event\MessagePosted;
use Doctrine\ORM\Mapping as ORM;
use SimpleBus\Message\Recorder\PrivateMessageRecorderCapabilities;
use SimpleBus\Message\Recorder\RecordsMessages;

/**
 * Post
 *
 * @ORM\Table("post")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PostRepository")
 */
class Post implements RecordsMessages
{
    use PrivateMessageRecorderCapabilities;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=100)
     */
    private $author;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Post
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Post
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $message
     * @param string $author
     *
     * @return static
     */
    static public function postNew($message, $author)
    {
        $post = new static();

        $post->setMessage($message);
        $post->setAuthor($author);

        // Dispatch event
        $post->record(new MessagePosted($post));

        return $post;
    }
}