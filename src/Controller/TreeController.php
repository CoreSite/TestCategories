<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TreeController extends FOSRestController
{
    /**
     * @Route("/api/{_locale}/tree", name="app.tree.index", requirements={"_local":"en|fr"})
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $categories = $this->get('app.manager.category_manager')->getCategoriesByLocale($request->getLocale());

        return $this->handleView($this->view($categories));
    }
}
