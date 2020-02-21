<h1>Ajouter un Tantara</h1>
<a href="?page=admin.posts.add" class="btn btn-success">Ajouter</a>
<table class='table'>
    <?php if (empty($posts)): ?>
            <em>
                <p>Aucun tantara,veuillez ajouter</p>
            </em>
    <?php else: ?>
        <thead>
            <td>Numero</td>
            <td>Titre</td>
            <td>Category</td>
            <td>Action</td>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?=$post->id?></td>
                <td><a href="<?=$post->url?>"><?=$post->titre?></a></td>
                <td><?=$post->categorie?></td>
                <td>

                    <!-- <a href="?page=admin.posts.edit&id=<?=$post->id?>" class="btn btn-primary">Editer</a>
                    <form style="display:inline;" action="?page=admin.posts.delete" method='post'>
                        <input type="hidden" name="id" value="<?=$post->id?>" >
                        <button type='submit' class="btn btn-danger">Supprimer</button>
                    </form> -->
                    <?php if ($post->partager == 0): ?>
                        <a href="?page=admin.posts.partage&id=<?=$post->id?>" class="btn btn-success">Partager</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
<?php endif;?>
</table>
