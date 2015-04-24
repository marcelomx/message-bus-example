<?php
namespace App\Handler;

use AppBundle\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class PostMessageHandler implements MessageHandler
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Message $message
     */
    public function handle(Message $message)
    {
        $author  = $message->getAuthor();
        $message = $message->getMessage() . ' ' . uniqid();

        $post = Post::postNew($message, $author);
        $this->entityManager->persist($post);
        //$this->entityManager->flush();
    }
}