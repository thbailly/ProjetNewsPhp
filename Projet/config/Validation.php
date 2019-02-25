<?php

class Validation {

    static function val_action($action) {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
            //on pourrait aussi utiliser
//$action = $_GET['action'] ?? 'no';
            // This is equivalent to:
            //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
        }
    }

    static  function val_page($page,$nbPageMax): int
    {
        if($page == NULL)
            return 1;
        if (filter_var($page, FILTER_VALIDATE_INT)) {
            if($page>$nbPageMax){
                return $nbPageMax;
            }
            else
                return $page;
        }
        else{
            return 1;
        }
    }

    static function val_login($login){
        global $rep, $vues;
        if(!isset($login)||$login=="") {
            $dVueErreur[] = "Login vide ";
            require_once($rep.$vues['erreur']);
        }
        else
            return $login;
    }

    static function val_mdp($mdp){
        global $rep, $vues;
        if(!isset($mdp)||$mdp=="") {
            $dVueErreur[] = "mot de passe vide";
            require_once($rep.$vues['erreur']);
        }
        else
            return $mdp;
    }

    static function val_role($role){
        global $rep, $vues;
        if(!isset($role)||($role!="admin" && $role!="visiteur" && $role!="sa")) {
            require_once($rep.$vues['erreur']);
        }
        else
            return $role;
    }



    static function val_form(string &$identifiant, string &$mdp, array &$dVueEreur) {

        if (!isset($identifiant)||$identifiant=="") {
            $dVueEreur[] =	"pas de nom";
            $identifiant="";
        }

        if ($identifiant != filter_var($identifiant, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"tentative d'injection de code (attaque sécurité)";
            $identifiant="";

        }


    }

    public static function validerRSS(string $path):string{
        return ( filter_var($path,FILTER_VALIDATE_URL) );
    }

    public static function sanitizeString(string $string):string{
        return filter_var($string,FILTER_SANITIZE_STRING);
    }

}
?>

