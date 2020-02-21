<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class CategoryController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->auth->getUserStatut() !== 'admin') {
            $this->forbidden();
        }

        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('User');

    }
    public function index()
    {
        $categories = $this->Category->all();
        $this->render('admin.category.index', compact('categories'));
    }
    public function edit()
    {
        $message = false;
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            if ($result) {
                $message = true;
            }
        }
        $categorie = $this->Category->find([$_GET['id']]);
        $form = new \Core\HTML\BootstrapForm($categorie);
        $form_category = "edit_category";
        $this->render('admin.category.edit', compact('message', 'form', 'categorie', 'form_category'));
    }
    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'titre' => $_POST['titre'],
            ]);
            // header('Location: admin.php?page=posts.edit&id=' . App::getInstance()->getDb()->lastInsertedId());
            return $this->index();
        }
        $form = new \Core\HTML\BootstrapForm($_POST);
        $form_category = "add_category";
        $this->render('admin.category.edit', compact('form', 'form_category'));
    }
    public function delete()
    {
        $this->Category->delete($_POST['id']);
        return $this->index();
    }

}
