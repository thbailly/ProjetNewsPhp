<html>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajouter un Admin</h3>
                </div>
                <div class="panel-body">
                    <form name="valider" method="post" action="../index.php?action=ajouterAdmin">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" name="loginAdmin" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="mdpAdmin" type="password" autofocus>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block" value="Ajouter Admin">Ajouter l'admin</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Supprimer un Admin</h3>
                </div>
                <div class="panel-body">
                    <form name="supprimerAdmin" method="post" action="../index.php?action=supprimerAdmin">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" name="login" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="mdp" type="password" autofocus>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block" value="Supprimer Admin">Supprimer l'admin</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php



?>