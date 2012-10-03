<?php

namespace Arcamy\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations,
    FOS\RestBundle\Controller\Annotations\NoRoute,
    FOS\RestBundle\Controller\Annotations\Get,
    FOS\RestBundle\Controller\Annotations\Delete,
    FOS\RestBundle\Controller\Annotations\Put,
    FOS\RestBundle\Controller\Annotations\Post;

class ApiusersController extends Controller
{
    /**
     * @Get("/users")
     * 
     */
    public function getUsersAction()
    {
        $users = $this->getDoctrine()
                           ->getEntityManager()
                           ->getRepository('HomeBundle:User')
                           ->findAll();
        $view = View::create()  
          ->setStatusCode(200)  
          ->setData($users);  
        
        return $view;
    }
}
