<?php

namespace App\model;

class DbFunctions
{
    public function insert(User $user) {

       $sql = 'INSERT INTO mail VALUES (?,?)';

        $send = Connection::getCon()->prepare($sql);
        $send->bindValue(1, $user->getEmail());
        $send->bindValue(2, $user->getName());
        $send->execute();

    }


    public function verify($email) {

        $sql= 'SELECT * FROM mail WHERE email= ?';

        $send = Connection::getCon()->prepare($sql);
        $send->bindValue(1, $email);
        $send->execute();

        if($send->rowCount() > 0)
            return 1;
        else
            return 0;
    }


    public function selectAll(){

        $sql = 'SELECT * FROM mail';

        $send = Connection::getCon()->prepare($sql);
        $send->execute();

        if($send->rowCount() > 0) {
             $result = $send->fetchAll(\PDO::FETCH_ASSOC);

             return $result;
        } else
            return [];

    }

    public function search($search){

        $sql= 'SELECT * FROM mail WHERE email LIKE ?';

        $send = Connection::getCon()->prepare($sql);
        $send->bindValue(1, trim($search).'%');
        $send->execute();

        if($send->rowCount() > 0) {
            $result = $send->fetchAll(\PDO::FETCH_ASSOC);

            return $result;
        } else
            return [];



    }


    public function update (User $user) {
        $sql = 'UPDATE mail SET name = ? WHERE email = ? ';

        $send = Connection::getCon()->prepare($sql);
        $send->bindValue(1, $user->getName());
        $send->bindValue(2, $user->getEmail());
        $send->execute();
    }



}