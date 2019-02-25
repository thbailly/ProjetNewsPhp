<html>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ajouter une News</h3>
                    </div>
                    <div class="panel-body">
                        <form name="valider" method="post" action="../index.php?action=ajoutNews">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Titre" name="titre" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Guid" name="guid" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Url" name="url" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Date" name="datePubli" type="text" autofocus>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" value="Ajouter News">Ajouter la News</button>
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
                        <h3 class="panel-title">Supprimer une News</h3>
                    </div>
                    <div class="panel-body">
                        <form name="supprimerNews" method="post" action="../index.php?action=supprimerNews">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Guid" name="guid" type="text" autofocus>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" value="Supprimer News">Supprimer la News</button>
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
                        <h3 class="panel-title">Ajouter un flux RSS</h3>
                    </div>
                    <div class="panel-body">
                        <form name="validerFlux" method="post" action="../index.php?action=ajoutFlux">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Titre" name="titre" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Guid" name="guid" type="text" autofocus>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" value="Ajouter Flux">Ajouter</button>
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
                        <h3 class="panel-title">Supprimer un flux RSS</h3>
                    </div>
                    <div class="panel-body">
                        <form name="SupprimerFlux" method="post" action="../index.php?action=supprimerFlux">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Guid" name="guid" type="titre" autofocus>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Supprimer</button>
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
                        <form name="MajFlux" method="post" action="../index.php?action=majflux">
                           <button type="submit" class="btn btn-lg btn-success btn-block">Mettre à jour les news</button>
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
                        <form name="MajFlux" method="post" action="../index.php?action=retour">
                            <button type="submit" class="btn btn-lg btn-success btn-block">Retour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>