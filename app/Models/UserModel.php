<?php


namespace App\Models;


class UserModel extends BaseModel {

    function getList(){
        $dbh = $this->db->prepare("SELECT * FROM users WHERE 1");
        $dbh->execute();
        if($dbh->rowCount()){
            return $dbh->fetchAll();
        }
    }

}