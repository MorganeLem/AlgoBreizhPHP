<?php
$this->title = 'Connexion';
$this->menuLinks = '';
?>

		<div class="jumbotron">

			 <form id="formConnexion" action="" method="post">
                    <fieldset>
                        <legend>Entrez vos informations de connexion</legend>

                        <div class="form-group"><label>Email ou code client : </label> <input class="form-control" type="text" name="login"></div>

                        <div class="form-group-lg"><label>Mot de passe : </label><input class="form-control" type="password" name="pswd"></div>

                        <div class="form-group" id="div-btn-connection">

                            <a href="index.php?action=remember" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-chevron-right"> </span> Mot de passe oublié</a>

                            <a class="btn btn-lg btn-warning pull-right" type="submit"><span class="glyphicon glyphicon-chevron-right"> </span> Se connecter</a>

                        </div>


                    </fieldset>
            </form>

        </div>