<?php

class SuperAdmin

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

    function getMdpSA(){
        return $this->mdp;
    }

    function getLoginSA():String{
        return $this->login;
    }

    function getRoleSA():String{
        return $this->role;
    }

}
