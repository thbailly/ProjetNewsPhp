<?php

class FrontController
{
    private $listeAction_Admin=array("deconnexion","ajoutNews","supprimerNews","ajoutFlux","supprimerFlux","majflux","retour");
    private $listeAction_SA=array("supprimerAdmin","ajouterAdmin","deconnexionSA");

    public function __construct()
    {
        global $rep, $vues;
        $dVueErreur = array ();

        try{
            if(isset($_REQUEST['action']))
            {
                $action=$_REQUEST['action'];
            }
            else{
                $action=null;
            }

            if(in_array($action,$this->listeAction_SA)) {
                if (ModeleSuperAdmin::isSuperAdmin() != null) {
                    new ControleurSuperAdmin();
                }
                else {
                    require($rep.$vues['vueAuthentification']);
                }
            }
            if(in_array($action,$this->listeAction_Admin)){
                if (ModeleAdmin::isAdmin()!=null) {
                    new ControleurAdmin();
                }
                else{
                    require($rep.$vues['vueAuthentification']);
                }
            }
            else {
                new ControleurVisiteur();
            }


        }
        catch (Exception $e){
            $dVueErreur[] =	"Erreur d'appel php 1";
            require_once($rep.$vues['erreur']);
        }

    }
}
