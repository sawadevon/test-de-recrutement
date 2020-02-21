<h1>Administrer les Categories</h1>
<a href="?page=admin.category.add" class="btn btn-success">Ajouter</a>
<?php if (empty($categories)): ?>
    <p><em>Aucune categorie,veuillez en ajouter</em></p>
<?php else: ?>
    <table class='table'>
        <thead>
            <td>Id</td>
            <td>Titre</td>
            <td>Action</td>
        </thead>
        <tbody>
            <?php foreach ($categories as $categorie): ?>
            <tr>
                <td><?=$categorie->id?></td>
                <td><?=$categorie->titre?></td>
                <td>
                    <a href="index.php?page=admin.category.edit&id=<?=$categorie->id?>" class="btn btn-primary">Editer</a>
                    <!-- <form style="display:inline;" action="index.php?page=admin.category.delete" method='post'>
                        <input type="hidden" name="id" value="<?=$categorie->id?>" >
                        <button type='submit' class="btn btn-danger">Supprimer</button>
                    </form> -->
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
<?php endif;?>
