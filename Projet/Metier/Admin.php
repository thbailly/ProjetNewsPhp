<?php

class Admin
{
    private $login;
    private $role;
    private $mdp;

    function __construct(string $login,$mdp, string $role)
    {
        $this->login=$login;
        $this->mdp=$mdp;
        $this->role=$role;
    }

    function getMdp():String{
        return $this->mdp;
    }

    function getLoginAdmin():String{
        return $this->login;
    }

    function getRole():String{
        return $this->role;
    }

}