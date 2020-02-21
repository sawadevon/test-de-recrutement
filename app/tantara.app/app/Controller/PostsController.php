<?php
namespace App\Controller;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }
    public function accueil()
    {
        $this->render('posts.accueil');
    }
    public function index()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category()
    {
        $categorie = $this->Category->find([$_GET['id']]);
        if (!$categorie) {
            $this->notFound;
        }
        $posts = $this->Post->lastByCategorie([$_GET['id']]);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('categorie', 'posts', 'categories'));
    }

    public function show()
    {
        $post = $this->Post->findWithCategory([$_GET['id']]);
        if (!$post) {
            $this->notFound;
        }
        $auteur = $this->Post->getAuteur([$post->id_user]);
        $this->render('posts.show', compact('post', 'auteur'));
    }
}
