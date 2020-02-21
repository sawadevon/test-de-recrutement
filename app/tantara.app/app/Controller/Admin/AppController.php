<?php
namespace App\Controller\Admin;

use App;

class AppController extends \App\Controller\AppController
{
    protected $auth;
    public function __construct()
    {
        parent::__construct();
        $app = App::getInstance();
        $this->auth = new \Core\Auth\DBAuth($app->getDb());

        if (!$this->auth->logged()) {
            $this->forbidden();
        }
    }
}
