<html>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Administrateur</h3>
                    </div>
                    <div class="panel-body">
                        <form name="valider" method="post" action="../index.php?action=connexionAdmin">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" name="login" type="login" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="mdp" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
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
                        <h3 class="panel-title">Login Super Administrateur</h3>
                    </div>
                    <div class="panel-body">
                        <form name="valider2" method="post" action="../index.php?action=connexionSA">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" name="login" type="login" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="mdp" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>


</html>

