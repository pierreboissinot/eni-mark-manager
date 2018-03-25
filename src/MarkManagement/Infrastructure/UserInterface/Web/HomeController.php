<?php

namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('home/index.html.twig');
    }
}
