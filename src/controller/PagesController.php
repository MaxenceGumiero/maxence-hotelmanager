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
        $clients = $this->container->getClientManager()->findAll();
        foreach($rooms as $room) {
            if ($room->getClientId()) {
                $client = $this->container->getClientManager()->findOneById($room->getClientId());
            } else {
                $client = Null;
            }
            $room->setClient($client); 
        }
        // 2. Afficher les rooms
        echo $this->container->getTwig()->render('pages/index.html.twig', [
            'rooms' => $rooms, 'clients' => $clients,
        ]);
    }

    /**
     * Traitement du formulaire de création puis redirection vers l'index des rooms
     * POST /rooms/new
     */
    public function create() {
        $this->container->getRoomManager()->create($_POST);
        $this->index();
    }

    /**
     * Affichage du formulaire d'édition
     * GET /rooms/new
     */
    public function edit(int $id) {

        $client = $this->container->getRoomManager()->findOneById($id);

        echo $this->container->getTwig()->render('rooms/form.html.twig', [
            'client' => $client
        ]);
    }

    /**
     * Suppression d'un client
     * GET /rooms/:id/delete
     */
    public function delete(int $id) {
        $this->container->getRoomManager()->delete($id);
        $this->index();
    }

    /**
     * Traitement du formulaire d'édition puis redirection vers l'index des rooms
     * POST /rooms/new
     */
    public function update(int $id) {
        $this->container->getRoomManager()->update($id, $_POST);
        $this->index();
    }
}