<?php

class ModeleAdmin
{

    public function connexionAdmin(string $loginAdmin, string $mdpAdmin)
    {
        global $base, $login, $mdp;
        $loginAdmin = Validation::val_login($loginAdmin);
        $mdpAdmin = Validation::val_mdp($mdpAdmin);
        $g = new AdminGateway(new Connexion($base, $login, $mdp));
        $hashA = $g->checkAdmin($loginAdmin);
        $res=password_verify($mdpAdmin,$hashA);
        if ($res == false) {
            echo "connexion échoué"."</br>";
            return false;
        }
        else{
            $_SESSION['login'] = 'login';
            $_SESSION['role'] = 'admin';
            return new Admin($login, $mdpAdmin, 'admin');
        }
    }


    public static function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
}

    public static function isAdmin(){
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login=Validation::val_login($_SESSION['login']);
            $role=Validation::val_role($_SESSION['role']);
            if ($role == "admin")
                return new Admin($login,null,$role);
        }
        else {
            return null;
        }

    }

    public function ajoutNews(string $newTitle, string $newGuid,string $newUrl, string $newDate){
        global $base, $login, $mdp;
        $newTitle=Validation::sanitizeString($newTitle);
        $newGuid = Validation::sanitizeString($newGuid);
        $newUrl = Validation::sanitizeString($newUrl);
        $newDate = Validation::sanitizeString($newDate);
        $g = new NewsGateway(new Connexion($base, $login, $mdp));
        $g->insertNews($newTitle,$newGuid,$newUrl,$newDate);

    }

    public function supprimerNews(string $guid){
        global $base, $login, $mdp;
        $g = new NewsGateway(new Connexion($base, $login, $mdp));
        $g->supprimerNews($guid);

    }

    public function ajoutFlux(string $guid, string $titre){
        global $base, $login,$mdp;
        $fg = new FluxGateway(new Connexion($base,$login,$mdp));
        $fg->insertFlux(new Flux($guid,$titre));
    }

    public function supprimerFlux(string $guid){
        global $base,$login,$mdp;
        $g = new FluxGateway(new Connexion($base,$login,$mdp));
        $g->deleteFlux($guid);
    }

    public function majFlux(){
        global $login, $mdp, $base;
        $parser = new XmlParser(new Connexion($base,$login,$mdp));
        $parser->parseAll();
    }
}