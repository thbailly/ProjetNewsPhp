<?php
/**
 * Created by PhpStorm.
 * User: legueret
 * Date: 30/11/18
 * Time: 14:02
 */
//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

$dConfig['includes']= array('config/Validation.php');
$dConfig['includes']= array('controleur/ControleurVisiteur');
$dConfig['includes']= array('controleur/ControleurAdmin');
//BD

//DB Lénaïg
/*
$base="mysql:host=localhost;dbname=my_database";
$login="lenaig";
$mdp="lenaig";*/
//DB Thibaut

$base="mysql:host=localhost;dbname=thibaut";
$login="root";
$mdp="";

//Vues
$vues['erreur']='vues/erreur.php';
$vues['vue']='vues/vue.php';
$vues['vueAuthentification']='vues/vuAuthentification.php';