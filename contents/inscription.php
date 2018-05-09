<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<form class="form-horizontal" action='' method="POST">
    <fieldset>
        <div id="legend">
            <legend class="">Register</legend>
        </div>
        <div class="control-group">
            <!-- Username -->
            <label class="control-label"  for="username">Pseudo</label>
            <div class="controls">
                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                <p class="help-block">Entrez votre pseudo</p>
            </div>
        </div>

        <div class="control-group">
            <!-- E-mail -->
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <p class="help-block">Entrez votre e-mail</p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password-->
            <label class="control-label" for="password">Mot de passe</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">Veuillez entrez votre mot de passe</p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password -->
            <label class="control-label"  for="password_confirm">Mot de passe confirmé</label>
            <div class="controls">
                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                <p class="help-block">Confirmez votre mot de passe</p>
            </div>
        </div>

        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success">Register</button>
            </div>
        </div>
    </fieldset>
</form>