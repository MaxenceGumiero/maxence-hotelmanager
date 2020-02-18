<?php

namespace App\Model;

class Room {

    private $id;
    private $number;
    private $clientId;
    private $client;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getClientId() {
        return $this->clientId;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
    }

    /**
     * @return Client
     */
    public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
    }

}