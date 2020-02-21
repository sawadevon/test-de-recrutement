<?php if (isset($message) && $message): ?>
<?='<div class="alert alert-success">l\'article a ete bien modifie</div>'?>
<?php endif;?>
<form name="<?=$form_name?>" method="post">
<?=$form->input('titre', 'Titre du tantara')?>
<?=$form->input('contenu', 'Contenu', ['type' => 'textarea'])?>
<?=$form->select('id_categorie', 'Categorie', $categories)?>
<input type="submit" class='btn btn-primary'value="Ajouter">
</form>