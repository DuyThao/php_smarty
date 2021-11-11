<?php


namespace App\Models;

use DateTime;
use PDO;
use PDOException;

class StudentModel extends BaseModel
{

    public  int $id;
    public  string $name;
    public  string $courses;
    public  float $score;
    public  string $time;


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

        $dbh = $this->db->prepare("SELECT * FROM student LIMIT " . $offset . "," . $limit . " WHERE name  LIKE '%{$search}%' ");
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }

    function create_unsafe($data)
    {
        $sql = "INSERT INTO student (name, courses, score, time)  VALUES ('" . $data["name"] . "', '" . $data["courses"] . "' , " . $data["score"] . ", '" . $data["time"] . "')";
        try {
            $this->db->exec($sql);
            return json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }

    function create($data)
    {
        $sql = "INSERT INTO student (name, courses, score, time)  VALUES ('" . $data->name . "', '" . $data->courses . "' , " . $data->score . ", '" . $data->time . "')";
        try {
            $this->db->exec($sql);
            return json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }

    function update($data)
    {
        $sql = "UPDATE student SET name = '" . $data->name . "' , courses = '" . $data->courses . "' , score =" . $data->score . ",  time = '" . $data->time . "' WHERE id =?" ;

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$data->id]);
            return  json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }

    function delete_unsafe($id)
    {
        $sql = "DELETE FROM student WHERE id=" . $id;
        try {
            $this->db->exec($sql);
            return  json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }

    function delete($id)
    {
        try {
        $dbh = $this->db->prepare("DELETE FROM student WHERE id=?");
        $dbh->execute([$id]);
            return  json_encode(['code' => 200]);
        } catch (PDOException $e) {
            return  json_encode(['code' => 500]);
        }
    }

    function getItem1($id)
    {
        $dbh = $this->db->prepare("SELECT * FROM student WHERE id=" . $id); //
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
    function getItem($id)
    {
        $dbh = $this->db->prepare("SELECT * FROM student WHERE id=?");
        $dbh->execute(array($id));
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }
    function search($offset, $limit, $text, $column, $type, $top)
    {
        if ($top == "true") {
            $dbh = $this->db->prepare("SELECT * FROM student  ORDER BY score DESC LIMIT 3 ");

        } else {
            $dbh = $this->db->prepare("SELECT * FROM student WHERE name  LIKE '%{$text}%' or courses  LIKE '%{$text}%' or score  LIKE '%{$text}%' ORDER BY {$column} {$type} LIMIT {$offset},{$limit}");
        }
        $dbh->execute();
        if ($dbh->rowCount()) {
            return  $dbh->fetchAll(PDO::FETCH_NUM);
        }
    }

    function countStudent($table, $text, $column, $type)
    {
        $dbh = $this->db->prepare("SELECT COUNT(*) FROM {$table} WHERE name  LIKE '%{$text}%' or courses  LIKE '%{$text}%' or score  LIKE '%{$text}%' ORDER BY {$column} {$type}");
        $dbh->execute();
        $count = $dbh->fetchColumn();
        return $count;
    }
    function top3($table)
    {
        $dbh = $this->db->prepare("SELECT TOP 3 FROM {$table}  ORDER BY score DESC");
        $dbh->execute();
        $count = $dbh->fetchColumn();
        return $count;
    }
}
