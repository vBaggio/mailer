<?php

namespace App\model;

class Connection {

    private static $dsn='mysql:host=YOUR HOST; dbname=YOUR DB NAME';
    private static $username='YOUR DB USERNAME';
    private static $password='YOUR DB PASS'; //You must encrypt it

    private static $con;

    public static function getCon() {
        try {
        if(!isset(self::$con))

          self::$con = new \PDO( self::$dsn, self::$username, self::$password);
          self::$con->exec("set names utf8");



        } catch (\PDOException $e) {

           echo $e->getMessage();
           exit();
        }

        return self::$con;
    }

}
