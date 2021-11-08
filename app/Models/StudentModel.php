<?php


namespace App\Models;

use PDO;
use PDOException;

class StudentModel extends BaseModel
{

    function getList($offset, $limit)
    {
        $dbh = $this->db->prepare("SELECT * FROM student LIMIT " . $offset . "," . $limit);
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
    //new get list 
    function getList_new($offset, $limit, $search)
    {
        
        $dbh = $this->db->prepare("SELECT * FROM student LIMIT " . $offset . "," . $limit ." WHERE name  LIKE '%{$search}%' ");
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
    
    function create($data)
    {
        $sql = "INSERT INTO student (name, courses, score, time)  VALUES ('" . $data["name"] . "', '" . $data["courses"] . "' , " . $data["score"] . ", '" . $data["time"] . "')";
        try {
            $this->db->exec($sql);
            return json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }
    function update($data)
    {
        $sql = "UPDATE student SET name = '" . $data["name"] . "' , courses = '" . $data["courses"] . "' , score =" . $data["score"] . ",  time = '" . $data["time"] . "' WHERE id =" . $data['id'];

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return  json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }

    function delete($id)
    {
        $sql = "DELETE FROM student WHERE id=" . $id;
        try {
            $this->db->exec($sql);
            return  json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }
    function getItem1($id){
        $dbh = $this->db->prepare("SELECT * FROM student WHERE id=".$id); //'a' or 1=1 
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
    function getItem($id){
        $dbh = $this->db->prepare("SELECT * FROM student WHERE id=?");
        $dbh->execute(array($id));
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
    function search($text){
        $dbh = $this->db->prepare("SELECT * FROM student WHERE name  LIKE '%{$text}%'");
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
}
