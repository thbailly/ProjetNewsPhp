<?php

class ControleurVisiteur {

    function __construct() {


        global $rep,$vues; // nécessaire pour utiliser variables globales


//debut

//on initialise un tableau d'erreur
        $dVueErreur = array ();

        try{
            if(isset($_REQUEST['action']))
            {
                $action=$_REQUEST['action'];
            }
            else {
                $action=NULL;
            }


            switch($action) {

//pas d'action, on réinitialise 1er appel
                case NULL:
                    $this->afficherNews();
                    break;


                case "cliquer news":
                    $this->cliquerNews();
                    break;

                case "connexionAdmin":
                    $this->connexionAdmin();
                    break;

 		case "connexionSA":
                    $this->connexionSA();
                    break;

//mauvaise action
                default:
                    $dVueErreur[] =	"Erreur d'appel php";
                    require_once($rep.$vues['erreur']);
                    break;
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            echo $e->getMessage();
            require_once($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            echo $e2->getMessage();
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require_once($rep.$vues['erreur']);
        }


//fin
        exit(0);
    }//fin constructeur


    function afficherNews(){
        global $rep,$vues;

        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
        }
        else{
            $page=1;
        }

        $m=new Modele();
        $nbPageMax=$m->getNombreNews();
        $page = Validation::val_page($page,$nbPageMax);
        $tabNews=$m->getNews($page);
        require_once($rep.$vues['vue']);
    }

    

    public function connexionAdmin(){
        global $rep,$vues;
        if(isset($_REQUEST['login']) && isset($_REQUEST['mdp'])){
            $ma=new ModeleAdmin();
            $res=$ma->connexionAdmin($_REQUEST['login'],$_REQUEST['mdp']);
            if($res==false) {
                $dVueErreur[] = "Erreur connexion";
                require_once($rep . $vues['erreur']);
            }
            else {
                $_REQUEST=array();
                $_REQUEST['action']=null;
                new ControleurAdmin();
            }
        }
        else
            $dVueErreur[] =	"Erreur connexion";
            require_once($rep.$vues['erreur']);
    }

  public function connexionSA(){
        global $rep,$vues;
        if(isset($_REQUEST['login']) && isset($_REQUEST['mdp'])){
            $msa=new ModeleSuperAdmin();
            $res=$msa->connexionSA($_REQUEST['login'],$_REQUEST['mdp']);
            if($res==false) {
                $dVueErreur[] = "Erreur connexion";
                require_once($rep . $vues['erreur']);
            }
            else {
                $_REQUEST=array();
                $_REQUEST['action']=null;
                new ControleurSuperAdmin();
            }
        }
        else
            $dVueErreur[] =	"Erreur connexion";
        require_once($rep.$vues['erreur']);
    }

}//fin class

?>
