<?php
namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
    protected $table = 'posts';
    /**
     * recupere les derniers article
     *
     * @return array
     */
    public function allByUser()
    {
        $condition = isset($_SESSION['Auth']) ? 'WHERE id_user=' . $_SESSION['Auth'] : '';

        return $this->query("
            SELECT $this->table.id,$this->table.titre,$this->table.contenu,$this->table.date,users.nom as auteur,partager,categories.titre as categorie
            FROM $this->table
            LEFT JOIN categories ON $this->table.id_categorie=categories.id
            LEFT JOIN users ON $this->table.id_user=users.id
            $condition
            ORDER BY $this->table.date DESC"
        );
    }
    public function last()
    {
        return $this->query("
            SELECT $this->table.id,$this->table.titre,$this->table.contenu,$this->table.date,users.nom as auteur,partager,categories.titre as categorie
            FROM $this->table
            LEFT JOIN categories ON $this->table.id_categorie=categories.id
            LEFT JOIN users ON $this->table.id_user=users.id
            ORDER BY $this->table.date DESC"
        );
    }
    /**
     * recupere les dernier posts de la categorie demandee
     *
     * @param array $category_id
     * @return array
     */
    public function lastByCategorie($category_id)
    {
        return $this->query(
            "SELECT $this->table.id,$this->table.titre,$this->table.contenu,$this->table.date,partager,users.nom as auteur,categories.titre as categorie
            FROM $this->table
            LEFT JOIN categories ON $this->table.id_categorie=categories.id
            LEFT JOIN users ON $this->table.id_user=users.id
            WHERE categories.id=?
            ORDER BY $this->table.date DESC",
            $category_id);
    }
    /**
     * recupere un article en liant la categorie associe
     *
     * @param array $id
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id)
    {
        return $this->query(
            "SELECT $this->table.id,$this->table.titre,$this->table.contenu,$this->table.id_user,$this->table.date,categories.titre as categorie
            FROM $this->table
            LEFT JOIN categories ON $this->table.id_categorie=categories.id
            WHERE $this->table.id=?",
            $id,
            true);
    }

    public function getAuteur($id_user)
    {
        return $this->query(
            "SELECT users.nom FROM users
            LEFT JOIN $this->table ON $this->table.id_user=users.id
            WHERE $this->table.id_user=?",
            $id_user,
            true
        );
    }

}
