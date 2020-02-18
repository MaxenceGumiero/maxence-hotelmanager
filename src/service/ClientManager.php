<?php
namespace App\Service;

use App\Model\Client;
use PDO;

class ClientManager extends AbstractManager implements ManagerInterface {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
    }

    /**
     * @param array $array
     * @return Client
     */
    public function arrayToObject(array $array)
    {
        $client = new Client;
        $client->setId($array['id']);
        $client->setFirstname($array['firstname']);
        $client->setLastname($array['lastname']);
        $client->setEntryDate($array['entry_date']);
        $client->setDepartureDate($array['departure_date']);
        
        // $client->setClient(); // à faire

        return $client;
    }

    /**
     * @return Client[]
     */
    public function findAll()
    {
        $query = "SELECT * FROM client";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $clients = [];

        foreach($data as $d) {
            $clients[] = $this->arrayToObject($d);
        }

        return $clients;
    }

    /**
     * @param int $id
     * @return Client
     */
    public function findOneById(int $id)
    {
        $query = "SELECT * FROM client WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(['id' => $id]);

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        $client = $this->arrayToObject($data);

        return $client;
    }

    /**
     * @param string $field
     * @param string $value
     * @return Client[]
     */
    public function findByField(string $field, string $value)
    {
    }

    /**
     * @param array $data
     */
    public function create(array $data) {
        $query = "INSERT INTO client(firstname, lastname, entry_date, departure_date) VALUES(:firstname, :lastname, :entryDate, :departureDate)";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'entryDate' => $data['entryDate'],
            'departureDate' => $data['departureDate'],
        ]);
    }

    /**
     * @param array $data
     */
    public function update(int $id, array $data)
    {
        $query = "UPDATE client SET firstname = :firstname, lastname = :lastname, entry_date = :entryDate, departure_date = :departureDate WHERE id = :id";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id,
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'entryDate' => $data['entryDate'],
            'departureDate' => $data['departureDate'],
        ]);

    }

    public function delete(int $id) {
        $query = "DELETE FROM client WHERE id = :id";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id,
        ]);
    }
}