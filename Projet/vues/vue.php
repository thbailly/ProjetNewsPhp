<!Doctype HTML>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title> Page d'accueil </title>
</head>



<body>
<div class="container">
    <?php
    if(ModeleAdmin::isAdmin()){ ?>
        <h1>Vous êtes connecté(e) en tant qu'administrateur </h1>

        <a href="index.php?action=deconnexion"> Déconnexion </a>
        </br>
        </br>
        <a href="vues/vueAdmin.php">Gestion News</a>
        </br></br>
    <?php }

    if(ModeleSuperAdmin::isSuperAdmin()){ ?>
        <h1>Vous êtes connecté(e) en tant que super administrateur </h1>

        <a href="index.php?action=deconnexionSA"> Déconnexion </a>
        </br>
        </br>
        <a href="vues/vueAdmin.php">Gestion News</a>
        <a href="vues/vueGestionAdmin.php">Gestion Admin</a>
        </br></br>
    <?php }

    if(!ModeleAdmin::isAdmin() && !ModeleSuperAdmin::isSuperAdmin()) {?>
        <h1>Vous êtes visiteur</h1>

        <a href=vues/vueAuthentification.php>Connexion</a>
        </br>
        </br>
    <?php } ?>

    <?php
    $value=Modele::getNombreNews();
    if(isset($tabNews)){
        foreach($tabNews as $news){
            echo $news->getTitle().'</br>';
            // echo $news->getGuid().'</br>';
            echo '<a href='.$news->getUrl().'>'.$news->getUrl().'</a></br>';
            echo $news->getDatePublication().'</br>';
            //echo'<a href=\"index.php?newsUrl='.$news->getUrl().'\">'.$news->getTitle().'</a></br>';
            echo '</br>';
            echo '</br>';
        }



 	echo '<a href=index.php?page='.($page-1).'>Précédent </a>';
        echo '<a href=index.php?page=1> 1</a>';
        echo ' ... ';
        echo $page;
        echo ' ... ';
        echo '<a href=index.php?page='.Modele::getNombreNews().'>'.$value.'</a>';
        echo '<a href=index.php?page='.($page+1).'> Suivant</a>';
    }
    else{
        echo("Tableau de news pas set");
        $dVueErreur[]="Problème chargement News";
        require_once("erreur.php");
    }
    ?>
</div>







</body>
</html>


