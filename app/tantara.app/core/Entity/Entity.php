<?php
namespace Core\Entity;

class Entity
{
    /**
     * methode magique qui permet d'appeler un methode dans une class aprtir du mot clees
     *
     * @param string  $key
     * @return une methode qui sera executer
     */
    public function __get(string $key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}
