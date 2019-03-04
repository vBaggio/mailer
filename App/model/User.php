<?php
/**
 * Created by PhpStorm.
 * User: Vinícius Baggio
 * Date: 02/03/2019
 * Time: 14:45
 */

namespace App\model;

class User
{

    private $name, $email, $code;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}
