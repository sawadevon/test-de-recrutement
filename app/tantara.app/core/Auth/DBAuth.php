<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserId()
    {
        return $this->logged() ? $_SESSION['Auth'] : false;
    }

    public function getUserName()
    {
        return $this->logged() ? $_SESSION['username'] : false;
    }
    public function getUserStatut()
    {
        return $this->logged() ? $_SESSION['statut'] : false;
    }
    /**
     * Undocumented function
     *
     * @param string $pseudo
     * @param string $password
     * @return boolean
     */
    public function login($pseudo, $password)
    {
        $user = $this->db->prepare(
            "SELECT * FROM users WHERE username = ?",
            [$pseudo],
            null,
            true);
        if ($user) {
            if ($user->password == sha1($password)) {
                $_SESSION['Auth'] = $user->id;
                $_SESSION['username'] = $user->nom;
                $_SESSION['statut'] = $user->statut;
                return true;
            }
        }
        return false;
    }
    /**
     * savoir si l'utilisateur est connecter
     *
     * @return boolean
     */
    public function logged(): bool
    {
        return isset($_SESSION['Auth']);
    }
}
