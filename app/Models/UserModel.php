<?php


namespace App\Models;

use PDO;

class UserModel extends BaseModel {

    function getList(){
        $dbh = $this->db->prepare("SELECT * FROM users WHERE 1");
        $dbh->execute();
        if($dbh->rowCount()){
            return $dbh->fetchAll();
        }
    }
    function getItem1($id)
    {
        $dbh = $this->db->prepare("SELECT * FROM users WHERE id=" . $id); //'a' or 1=1 
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
    function getItem($id)
    {
        $dbh = $this->db->prepare("SELECT * FROM users WHERE id=?");
        $dbh->execute(array($id));
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }

}