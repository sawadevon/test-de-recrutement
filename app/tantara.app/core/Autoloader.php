<?php
namespace Core;

/**
 * Class Autoloader
 */
class Autoloader
{
    /**
     * Enregistre notre autoloader
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Inclue le fichier correspond a notre classe
     *
     * @param [type] $class le nom de la classe a charger
     * @return void
     */
    public static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }
}
