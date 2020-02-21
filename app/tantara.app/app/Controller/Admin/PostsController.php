<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }
    public function index()
    {
        $posts = $this->Post->allByUser();
        $this->render('admin.posts.index', compact('posts'));
    }
    public function edit()
    {
        $message = false;
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'id_user' => $_SESSION['Auth'],
                'id_categorie' => $_POST['id_categorie'],
            ]);
            if ($result) {
                $message = true;
            }
        }
        $post = $this->Post->find([$_GET['id']]);
        $form = new \Core\HTML\BootstrapForm($post);
        $categories = $this->Category->extract('id', 'titre');
        $form_name = 'edit_post';
        $this->render('admin.posts.edit', compact('message', 'post', 'form', 'categories', 'form_name'));
    }
    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'id_user' => $_SESSION['Auth'],
                'id_categorie' => $_POST['id_categorie'],
            ]);
            // header('Location: admin.php?page=posts.edit&id=' . App::getInstance()->getDb()->lastInsertedId());
            return $this->index();
        }
        $form = new \Core\HTML\BootstrapForm($_POST);
        $categories = $this->Category->extract('id', 'titre');
        $form_name = 'add_post';
        $this->render('admin.posts.edit', compact('form', 'categories', 'form_name'));
    }
    public function partage()
    {
        $this->Post->update($_GET['id'], [
            'partager' => 1,
        ]);
        return $this->index();
    }
    public function delete()
    {
        $this->Post->delete($_POST['id']);
        return $this->index();
    }

}
