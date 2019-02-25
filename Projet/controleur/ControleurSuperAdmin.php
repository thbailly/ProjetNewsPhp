<?php

class ControleurSuperAdmin
{
    function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales


//on initialise un tableau d'erreur
        $dVueErreur = array();


        try {
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            } else {
                $action = NULL;
            }

            switch ($action) {

                case NULL:
                    $this->afficherNews();
                    break;


                case "supprimerAdmin":
                    $this->supprimerAdmin();
                    break;

//mauvaise action

                case "ajouterAdmin":
                    $this->ajouterAdmin();
                    break;

                case "deconnexionSA":
                    $this->deconnexionSA();
                    break;

                default:
                    $dVueErreur[] = "Erreur d'appel php 3";
                    require($rep . $vues['erreur']);
                    break;
            }

        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueErreur[] = "Erreur inattendue 1!!! ";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueErreur[] = "Erreur inattendue 2!!! ";
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

    function ajouterAdmin()
    {
        global $rep, $vues;
        if(isset($_REQUEST['loginAdmin']) && isset($_REQUEST['mdpAdmin'])){
            $m = new ModeleSuperAdmin();
            //var_dump($_REQUEST['loginAdmin']);
            //var_dump($_REQUEST['mdpAdmin']);
            $m->ajouterAdmin($_REQUEST['loginAdmin'],$_REQUEST['mdpAdmin']);
            $_REQUEST=array();
            $_REQUEST['action']=null;
            new ControleurSuperAdmin();
        }
        else
            $dVueErreur[] = "Erreur dans l'ajout !!! ";
            require_once($rep.$vues['erreur']);
    }

    function supprimerAdmin()
    {
        global $rep, $vues;
        if (isset($_REQUEST['login']) && isset($_REQUEST['mdp'])){
            $m = new ModeleSuperAdmin();
            $res=$m->supprimerAdmin($_REQUEST['login'],$_REQUEST['mdp']);
            if($res==true){
                $_REQUEST=array();
                $_REQUEST['action']=null;
                new ControleurSuperAdmin();
            }
            else{
                $dVueErreur[] = "Erreur dans la suppression Admin!!! ";
                require_once($rep.$vues['erreur']);

            }

        }
        else {
            $dVueErreur[] = "Erreur dans la suppression !!! ";
            require_once($rep . $vues['erreur']);
        }

    }

    public function deconnexionSA()
    {
        global $rep,$vues;
        if(isset($_SESSION['login']) && isset($_SESSION['role'])) {
            ModeleSuperAdmin::deconnexionSA();
            $_REQUEST=array();
            $_REQUEST['action']=null;
            new ControleurVisiteur();
        }
        else{
            $dVueErreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
    }
}