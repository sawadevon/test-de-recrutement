<?php
namespace App\Controller;

use App\Controller\Admin\PostsController;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }
    public function login()
    {
        $message = false;
        if (!empty($_POST)) {
            $auth = new \Core\Auth\DBAuth(\App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                return (new PostsController())->index();
            } else {
                $message = true;
            }
        }
        $form = new \Core\HTML\BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'message'));
    }

    public function logout()
    {
        unset($_SESSION['Auth']);
        unset($_SESSION['Username']);
        unset($_SESSION['statut']);
        return $this->login();
    }

    public function register()
    {
        if (!empty($_POST)) {
            $this->User->create([
                'nom' => $_POST['nom'],
                'username' => $_POST['username'],
                'password' => sha1($_POST['password']),
            ]);
        }
        $form = new \Core\HTML\BootstrapForm($_POST);
        $this->render('users.register', compact('form', 'message'));
    }

}
