<?php

namespace AppBundle\Controller;

use App\Command\NewPostMessage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/app/post", name="new_post")
     */
    public function postAction(Request $request)
    {
        $message = $request->get('message');
        $author  = $request->get('author');

        $this->get('command_bus')->handle(new NewPostMessage($message, $author));

        return new Response('ok!');
    }
}
