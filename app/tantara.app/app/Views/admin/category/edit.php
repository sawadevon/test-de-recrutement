<?php if (isset($message) && $message): ?>
<?='<div class="alert alert-success">la categorie a ete bien modifie</div>'?>
<?php endif;?>
<form name="<?=$form_category?>" method="post">
<?=$form->input('titre', 'Titre de la categorie')?>
<input type="submit" class='btn btn-primary'value="Sauvegarder">
</form>