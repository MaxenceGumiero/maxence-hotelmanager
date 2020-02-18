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

    /**
     * Traitement du formulaire de création puis redirection vers l'index des rooms
     * POST /rooms/new
     */
    public function create()
    {
        $this->container->getRoomManager()->create($_POST);
        $this->index();
    }
}