<?php

class ControleurAdmin
{

    function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
            //session_start();


//debut

//on initialise un tableau d'erreur
        $dVueErreur = array();


        try {
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            } else {
                $action = NULL;
            }

            switch ($action) {

//pas d'action, on r�initialise 1er appel
                case NULL:
                    $this->afficherNews();
                    break;

                case "retour":
                    $this->retour();
                    break;

                case "ajoutNews":
                    $this->ajoutNews();
                    break;

                case "ajoutFlux":
                    $this->ajoutFlux();
                    break;

                case "supprimerFlux":
                    $this->supprimerFlux();
                    break;

                case "supprimerNews":
                    $this->supprimerNews();
                    break;

                case "majflux":
                    $this->majFlux();
                    break;

                case "deconnexion":
                    $this->deconnexion();
                    break;

                default:
                    $dVueErreur[] = "Erreur d'appel php";
                    require($rep . $vues['erreur']);
                    break;
            }

        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueErreur[] = "Erreur PDO inattendue!!! ";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueErreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }


//fin
        exit(0);
    }//fin constructeur


    function afficherNews()
    {
        global $rep, $vues;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $m = new Modele();
        $nbPageMax = $m->getNombreNews();
        $page = Validation::val_page($page, $nbPageMax);
        $tabNews = $m->getNews($page);
        require($rep . $vues['vue']);
    }

    function ajoutNews()
    {
        global $rep, $vues;
        if(isset($_REQUEST['titre']) && isset($_REQUEST['guid']) && isset($_REQUEST['url']) && isset($_REQUEST['datePubli'])){
            $m = new ModeleAdmin();
            $m->ajoutNews($_REQUEST['titre'],$_REQUEST['guid'],$_REQUEST['url'],$_REQUEST['datePubli']);
            $_REQUEST=array();
            $_REQUEST['action']=null;
            new ControleurAdmin();
        }
        else
            require_once($rep.$vues['erreur']);
    }

    function supprimerNews()
    {
        global $rep, $vues;
        if (isset($_REQUEST['guid'])) {
            $m = new ModeleAdmin();
            $m->supprimerNews($_REQUEST['guid']);
            $_REQUEST=array();
            $_REQUEST['action']=null;
            new ControleurAdmin();
        }
        else
            $dVueErreur[] = "Erreur dans la suppression !!! ";
            require_once($rep.$vues['erreur']);

    }

    public function deconnexion()
    {
        global $rep,$vues;
        if(isset($_SESSION['login']) && isset($_SESSION['role'])) {
            ModeleAdmin::deconnexion();
            $_REQUEST=array();
            $_REQUEST['action']=null;
            new ControleurVisiteur();
        }
        else{
            $dVueErreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
    }

    public function ajoutFlux(){
        global $rep,$vues;
        if(isset($_REQUEST['guid']) && isset($_REQUEST['titre'])){
            $m = new ModeleAdmin();
            $m->ajoutFlux($_REQUEST['guid'],$_REQUEST['titre']);
            $m->majFlux();
            $_REQUEST=array();
            $_REQUEST['action']=null;
            new ControleurAdmin();
        }
        else{
            $dVueErreur[]= "Erreur ajoutFlux";
            require_once($rep.$vues['erreur']);
        }
    }

    public function supprimerFlux(){
        global $rep,$vues;
        if(isset($_REQUEST['guid'])){
            $m = new ModeleAdmin();
            $m->supprimerFlux($_REQUEST['guid']);
            $_REQUEST=array();
            $_REQUEST['action']=null;
            new ControleurAdmin();
        }
        else{
            $dVueErreur[]= "Erreur suppressionFlux";
            require_once($rep.$vues['erreur']);
        }
    }

    public function majFlux(){
        $m = new ModeleAdmin();
        $m -> majFlux();
        $_REQUEST=array();
        $_REQUEST['action']=null;
        new ControleurAdmin();
    }

    public function retour(){
        $_REQUEST=array();
        $_REQUEST['action']=null;
        new ControleurAdmin();
    }
}
?>
