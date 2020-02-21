<?php
namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $table;
    protected $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
        /**
         * generer automatiquement le nom du table si celle si est null
         * exemple: App\Table\PostTable => posts
         */
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name . 's'));
        }
    }
    /**
     * return tous les enregistremet d'une table qui l'utilise
     *
     * @return array enregistrement de la base de donne
     */
    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }
    /**
     * faire une requete sql : soit query() soit prepare() de la class MysqlDatabase
     *
     * @param string $tatement requete
     * @param array $attributes listes des attributs recuperer dans les variables globales
     * @param boolean $one un seul enregistrement recuperer si true
     * @return void
     */
    public function query(string $tatement, array $attributes = null, bool $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $tatement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $tatement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }

    /**
     * changer une entite en tableau cle et valeur
     *
     * @param [type] $id
     * @param [type] $value
     * @return array
     */
    public function extract($id, $value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $k => $v) {
            $return[$v->$id] = $v->$value;
        }
        return $return;
    }

    public function find($id)
    {
        return $this->query(
            "SELECT * FROM $this->table WHERE id = ?",
            $id,
            true);
    }

    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k=?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = \implode(', ', $sql_parts);
        return $this->query(
            "UPDATE  $this->table SET $sql_part WHERE id = ?",
            $attributes,
            true);
    }

    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k=?";
            $attributes[] = $v;
        }
        $sql_part = \implode(', ', $sql_parts);
        return $this->query(
            "INSERT  $this->table SET $sql_part ",
            $attributes,
            true);
    }

    public function delete($id)
    {
        return $this->query(
            "DELETE FROM $this->table WHERE id=?",
            [$id]
        );
    }

}
