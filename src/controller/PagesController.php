<?php

namespace App\Controller;

class PagesController extends AbstractController {

    /**
     * Afficher la liste des rooms
     * Route: GET /
     */
    public function index() {
        // 1. Récupérer les rooms
        $rooms = $this->container->getRoomManager()->findAll();

        // 2. Afficher les rooms
        echo $this->container->getTwig()->render('pages/index.html.twig', [
            'rooms' => $rooms
        ]);
    }

}