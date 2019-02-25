<?php

class AdminGateway
{
    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function checkAdmin($login){
        $query='SELECT * FROM Admin WHERE login=:login';
        $this->con->executeQuery($query,array(
           ':login'=>array($login,PDO::PARAM_STR)
        ));
        $res=$this->con->getResults();
        if(isset($res)){
            return $res[0]['mdp'];
        }
        else {
            echo("</br>.KO"); /////////////
            return false;
        }
    }

  public function checkSA($login){
        $query='SELECT * FROM Admin WHERE login=:login AND role="sa"';
        $this->con->executeQuery($query,array(
            ':login'=>array($login,PDO::PARAM_STR)
        ));
        $res=$this->con->getResults();
        if(isset($res)){
            return $res[0]['mdp'];
        }
        else {
            echo("</br>.KO"); /////////////
            return false;
        }
    }

    public function selectAll()
    {
        $query="SELECT * FROM Admin";
        $this->con->executeQuery($query,array());

        return $this->con->getResults();
    }

    public function passwordHashAdmin(){

        $tabAdmin=$this->selectAll();
        if(isset($tabAdmin)) {
            foreach ($tabAdmin as $admin) {
                $pass=$admin['mdp'];
                $mdphash=password_hash($pass, PASSWORD_DEFAULT);
                if(!isset($mdphash)){
                    echo("probleme de hash");
                    return false;
                }
                else{
                    $this->updateMdpUser($admin['login'],$mdphash);
                }
            }
            return true;
        }
    }

    public function updateMdpUser($login,$mdphash){
        $query='UPDATE Admin SET mdp=:mdphash WHERE login=:login';
        $this->con->executeQuery($query,array(
           'mdphash'=> array($mdphash,PDO::PARAM_STR),
           'login'=> array($login,PDO::PARAM_STR)
        ));
    }

    public function removeAdmin($login,$mdp){

        $query='DELETE FROM Admin WHERE login=:login AND mdp=:mdp';
        $this->con->executeQuery($query, array(
            ':login'=>array($login,PDO::PARAM_STR),
            ':mdp'=>array($mdp,PDO::PARAM_STR)
        ));
    }

    public function addAdmin(string $login, string $mdp){
        $query='INSERT INTO Admin(login,mdp,role) VALUES(:login,:mdp,"admin")';
        $this->con->executeQuery($query, array(
            ':login'=>array($login,PDO::PARAM_STR),
            ':mdp'=>array($mdp,PDO::PARAM_STR)
        ));
        $this->hashNewAdmin($login);
    }

    public function selectAdmin($login)
    {
        $query="SELECT * FROM Admin WHERE login=:login";
        $this->con->executeQuery($query,array(
            ':login'=>array($login,PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }

    public function hashNewAdmin($login)
    {
        $admin = $this->selectAdmin($login);
        if (isset($admin)) {
            foreach ($admin as $value) {
                $pass = $value['mdp'];
                $mdphash = password_hash($pass, PASSWORD_DEFAULT);
                if (!isset($mdphash)) {
                    echo("probleme de hash");
                    return false;
                } else {
                    $this->updateMdpUser($value['login'], $mdphash);
                }
            }
            return true;

        }
    }

}
