<?php

namespace App\Controller;

class RoomsController extends AbstractController {

    /**
     * Afficher la page de 1 room
     * Route: GET /rooms/:id
     */
    public function show(int $id) {
        // 1. Récupérer la room par son id, puis de la liste de clients à afficher dans le select, puis d'un client si la room est déjà occupée ou non
        $room = $this->container->getRoomManager()->findOneById($id);
        // 2. Récupérer la liste de tous les clients
        $clients = $this->container->getClientManager()->findAll();
        // 3. Assigner un conditionnelement un client à une room si celle-ci possède un client_id différent de Null
        if ($room->getClientId()) { 
            $client = $this->container->getClientManager()->findOneById($room->getClientId());
            if (!$client->getId()) {
                $client = Null;
            }
        } else { 
            $client = Null;
        }
        $room->setClient($client); 
        //4. Afficher la room, ainsi que les clients pour le select
        echo $this->container->getTwig()->render('rooms/show.html.twig', [
            'room' => $room, 'clients' => $clients
        ]);
    }

    /**
     * Affichage du formulaire de création
     * GET /rooms/new
     */
    public function new()
    {
        echo $this->container->getTwig()->render('rooms/form.html.twig');
    }
}