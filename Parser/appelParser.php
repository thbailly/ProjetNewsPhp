<html>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Thibaut
 * Date: 27/12/2018
 * Time: 17:15
 */
    include('XmlParser.php');
    include('Connexion.php');
    include('News.php');
    include('NewsGateway.php');
    include ('Validation.php');
    $base="mysql:host=localhost;dbname=thibaut";
    $login="root";
    $mdp="";
    $parser = new XmlParser(new Connexion($base,$login,$mdp));
    $parser->parseAll();
    ?>
</body>
</html>
