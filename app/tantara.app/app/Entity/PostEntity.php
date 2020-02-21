<?php
namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{
    public function getUrl()
    {
        $url = 'index.php?page=posts.show&id=' . $this->id;
        return $url;
    }
    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 50) . '...</p>';
        $html .= '<a href="' . $this->getUrl() . '">voir la suite</a>';
        return $html;
    }
}
