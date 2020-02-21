<?php if (isset($message) && $message): ?>
<?='<div class="alert alert-danger">Identifiant ou Mot de passe incorrect</div>'?>
<?php endif;?>
<form name="login" class='col-lg-offset-3 col-lg-6' method="post">
<fieldset>
    <legend><center><h4>Connecter vous pour réaliser un Tantara</h4></center> </legend>
    <?=$form->input('username', 'Pseudo')?>
    <?=$form->input('password', 'Password', ['type' => 'password'])?>
    <input type="submit" class='btn btn-primary pull-right'value="Connecter">
</fieldset>
</form>