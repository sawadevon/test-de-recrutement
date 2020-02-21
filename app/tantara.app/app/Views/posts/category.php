<div class="row">
        <div class="col-sm-6">
        <h1><?=$categorie->titre?></h1>
        <?php if (empty($posts)): ?>
                <p><em>Aucun Tantara,connecter vous pour en Ajouter</em></p>
        <?else :?>
        <?php endif;?>
            <?php foreach ($posts as $post): ?>
                <?php if ($post->partager == 1): ?>
                        <tr>
                                <td><h3><a href="<?=$post->url?>"><?=$post->titre?></a></h3><p><em><?=$post->categorie?></em></p></td>
                                <td><?=$post->extrait?><p class='pull-right'><em><?=$post->auteur?></em></p></td>
                        </tr>
                <?php endif?>
            <?php endforeach;?>
    </div>
    <div class="col-sm-offset-2 col-sm-4">
    <h3>Categories des tantara</h3>
            <ul>
                    <?php foreach ($categories as $categorie): ?>
                            <li><a href="<?=$categorie->url?>"><?=$categorie->titre?></a></li>
                    <?php endforeach;?>
            </ul>
            <a  class="pull-right" href="index.php?page=users.login">Se connecter ?</a>
    </div>
</div>

