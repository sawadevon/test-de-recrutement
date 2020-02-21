<form name="registration" class='col-lg-offset-3 col-lg-6' method="post">
<fieldset>
    <legend><center><h4>Creer un compte utilisateur</h4></center> </legend>
    <?=$form->input('nom', 'Nom')?>
    <?=$form->input('username', 'Pseudo')?>
    <?=$form->input('password', 'Password', ['type' => 'password'])?>
    <input type="submit" class='btn btn-primary pull-right'value="Confirmer">
</fieldset>
</form>