<?php
namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public function getUrl()
    {
        $url = 'index.php?page=posts.category&id=' . $this->id;
        return $url;
    }
}
