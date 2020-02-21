<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=App::getInstance()->title?></title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <nav class='navbar navbar-inverse navbar-fixed-top'>
        <div class="container">
            <div class="navbar-header">
                <a href="index.php?page=posts.accueil" class="navbar-brand">TANTARA </a>
            </div>
            <div class="navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if (isset($_SESSION['Auth']) && $_SESSION['statut'] === 'admin'): ?>
                            <li><a href="index.php?page=admin.posts.index" class="navbar-brand">Administration</a></li>
                            <li><a href="index.php?page=admin.category.index" class="navbar-brand">Categories</a></li>
                    <?php elseif (isset($_SESSION['Auth'])): ?>
                            <li><a href="index.php?page=admin.posts.index" class="navbar-brand">Administration</a></li>
                    <?php endif;?>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <?php if (isset($_SESSION['Auth'])): ?>
                        <li>
                            <p class='navbar-brand'>(<?=$_SESSION['username']?>)</p>
                            <a class="navbar-brand" href="index.php?page=users.logout">
                                Deconnecter
                            </a>
                        </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="starter-template" style="padding-top : 100px;">
        <?=$content;?>
        </div>
    </div>
    <script src="public/js/jquery-2.1.1.js"></script>
    <script src="public/js/jquery.validate.js"></script>
    <script src="public/js/form-validation.js"></script>
</body>
</html>