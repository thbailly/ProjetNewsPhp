<?php

class Modele
{
    function getNews(int $page):array{
        global $base,$login, $mdp;
        $g=new NewsGateway(new Connexion($base,$login,$mdp));
        return $g->findNews($page);
    }

    static function getNombreNews():int{
        global $base,$login, $mdp;
        $g=new NewsGateway(new Connexion($base,$login,$mdp));
        $nombreDePageTest=$g->getNbPages();
        return $nombreDePageTest;
    }
}
