<?php
use Core\Config;
use Core\Database\Database;
use Core\Database\MysqlDatabase;

class App
{
    public $title = "Tantara";
    private $db_instance;
    private static $_instance;

    public static function load()
    {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    /**
     * faire une instanciation de la classe mysqlDatabase
     *
     * @return objet instance de mysqlDatabase
     */
    public function getDb(): Database
    {
        if (is_null($this->db_instance)) {
            $config = Config::getInstance(ROOT . '/config/config.php');
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));
        }
        return $this->db_instance;
    }
    /**
     * faire une instanciation de l'objet table $name
     *
     * @param string nom de la table
     * @return objet classe de la table $name
     */
    public function getTable(string $name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

}
