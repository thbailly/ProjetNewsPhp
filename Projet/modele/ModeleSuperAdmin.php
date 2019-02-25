<?php

class ModeleSuperAdmin
{


    public function connexionSA(string $loginSA, string $mdpSA)
    {
        global $base, $login, $mdp;
        $loginSA = Validation::val_login($loginSA);
        $mdpSA = Validation::val_mdp($mdpSA);
        $g = new AdminGateway(new Connexion($base, $login, $mdp));
        $hashA = $g->checkSA($loginSA);
        $res=password_verify($mdpSA,$hashA);
        if ($res == false) {
            echo "connexion échoué"."</br>";
            return false;
        }

        else{
            $_SESSION['login'] = 'login';
            $_SESSION['role'] = 'sa';
            return new SuperAdmin($login, $mdpSA, 'sa');
        }
    }

    public static function isSuperAdmin(){
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login=Validation::val_login($_SESSION['login']);
            $role=Validation::val_role($_SESSION['role']);
            if($role == "sa")
                return new SuperAdmin($login,null,$role);
        }
        else {
            return null;
        }

    }

    public static function deconnexionSA(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public function ajouterAdmin(string $loginAdmin, string $mdpAdmin){
        global $base, $login, $mdp;
        $g = new AdminGateway(new Connexion($base, $login, $mdp));
        $loginAdmin = Validation::val_login($loginAdmin);
        $mdpAdmin = Validation::val_mdp($mdpAdmin);
        $g->addAdmin($loginAdmin,$mdpAdmin);

    }

    public function supprimerAdmin(string $loginAdmin,string $mdpAdmin){
        global $base, $login, $mdp;
        $g = new AdminGateway(new Connexion($base, $login, $mdp));
        $loginAdmin = Validation::val_login($loginAdmin);
        $mdpAdmin = Validation::val_mdp($mdpAdmin);
        $hashA = $g->checkAdmin($loginAdmin);
        $res=password_verify($mdpAdmin,$hashA);
        var_dump($res);
        if($res==true){
            $g->removeAdmin($loginAdmin,$hashA);
            return true;
        }
        else
            return null;

    }
}