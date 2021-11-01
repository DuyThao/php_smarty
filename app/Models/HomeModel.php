<?php


namespace App\Models;


class HomeModel extends BaseModel {

    function getNames(){
        $dbh = $this->db->prepare("SELECT * FROM users WHERE 1");
        $dbh->execute();
        if($dbh->rowCount()){
            return $dbh->fetchAll();
        }
    }

}