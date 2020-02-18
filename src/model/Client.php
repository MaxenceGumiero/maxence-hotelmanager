<?php

namespace App\Model;

class Client {

    private $id;
    private $firstname;
    private $lastname;
    private $entryDate;
    private $departureDate;

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
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    
    /**
     * @return Date
     */
    public function getEntryDate() {
        return $this->entryDate;
    }

    public function setEntryDate($entryDate) {
        $this->entryDate = $entryDate;
    }

    /**
     * @return Date
     */
    public function getDepartureDate() {
        return $this->departureDate;
    }

    public function setDepartureDate($departureDate) {
        $this->departureDate = $departureDate;
    }
}