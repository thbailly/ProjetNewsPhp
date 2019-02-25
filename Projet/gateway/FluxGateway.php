<?php

class FluxGateway
{
    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insertFlux(Flux $flux){
        $query='INSERT INTO Flux VALUES(:guid,:titre)';
        $this->con->executeQuery($query,array(
            ':guid'=> array($flux->getGuid(),PDO::PARAM_STR),
            ':titre' => array($flux->getTitre(),PDO::PARAM_STR)
        ));
    }

    public function deleteFlux(string $guid){
        $query='DELETE FROM Flux WHERE guid = :guid';
        $this->con->executeQuery($query,array(
            ':guid' => array($guid,PDO::PARAM_STR)
        ));
    }
}