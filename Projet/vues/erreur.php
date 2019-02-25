<html>
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <title>Erreur</title></head>
<body>

<h1 class="page-header">ERREUR !!!!!</h1>

<?php
if (isset($dVueErreur)) {
    foreach ($dVueErreur as $value){
        echo $value;
    }
}
?>

</body>
</html>