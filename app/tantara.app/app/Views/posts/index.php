<div class="row">
        <div class="col-sm-6">
                <h3>Tout les tantara</h3>
                <?php if (empty($posts)): ?>
                        <em>
                                <p>Aucun Tantara,connecter vous pour en Ajouter</p>
                        </em>
                <?php else : ?>
                        <table class='table'>
                                <tbody>
                                        <?php foreach ($posts as $post): ?>
                                                <?php if ($post->partager==1) :?>
                                                        <tr>
                                                                <td><h3><a href="<?=$post->url?>"><?=$post->titre?></a></h3><p><em><?=$post->categorie?></em></p></td>
                                                                <td><?=$post->extrait?><p class='pull-right'><em><?=$post->auteur?></em></p></td>
                                                        </tr>
                                                <?endif;?>
                                        <?php endforeach;?>
                                </tbody>
                        </table>
                <?php endif;?>

        </div>
        <div class="col-sm-offset-2 col-sm-4">
                <h3>Categories des tantara</h3>
                <?php if (empty($categories)): ?>
                        <em>
                                <p>Aucune Categorie,connecter vous pour en creer</p>
                        </em>
                <?php else: ?>
                        <ul>
                                <?php foreach ($categories as $categorie): ?>
                                        <li><a href="<?=$categorie->url?>"><?=$categorie->titre?></a></li>
                                <?php endforeach;?>
                        </ul>
                <?php endif;?>
            <a  class="pull-right" href="index.php?page=users.login">Se connecter ?</a>
        </div>
</div>