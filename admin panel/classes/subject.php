<?php


namespace classes;

use PDO;
use PDOException;



class subject {
    private $sub_code;
    private $sub_name;
    private $credits;
    private $teacher;
    
    
    function __construct($sub_code, $sub_name, $credits, $teacher) {
        $this->sub_code = $sub_code;
        $this->sub_name = $sub_name;
        $this->credits = $credits;
        $this->teacher = $teacher;
    }
    
    function getSub_code() {
        return $this->sub_code;
    }

    function getSub_name() {
        return $this->sub_name;
    }

    function getCredits() {
        return $this->credits;
    }

    function getTeacher() {
        return $this->teacher;
    }

    function setSub_code($sub_code) {
        $this->sub_code = $sub_code;
    }

    function setSub_name($sub_name) {
        $this->sub_name = $sub_name;
    }

    function setCredits($credits) {
        $this->credits = $credits;
    }

    function setTeacher($teacher) {
        $this->teacher = $teacher;
    }

public function addSubject() {
    try {
            $dbcon = new DbConnector();
            $con = $dbcon->connect();
            $query = "INSERT INTO subject (sub_code,sub_name,credits,teacher) VALUES(?,?,?,?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->sub_code);
            $pstmt->bindValue(2, $this->sub_name);
            $pstmt->bindValue(3, $this->credits);
            $pstmt->bindValue(4, $this->teacher);
            $x = $pstmt->execute();
            return ($x > 0);
        } catch (PDOException $exc) {
            echo "Error in addSubject method:$exc->getMessage()";
        }
    }
    
    public static function updateSubject($sub_name,$credits,$teacher,$sub_code){
    try {
            $dbcon = new DbConnector();
            $con = $dbcon->connect();
            $query = "UPDATE subject SET sub_name=?,credits=?,teacher=? WHERE sub_code=?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $sub_name);
            $pstmt->bindValue(2, $credits);
            $pstmt->bindValue(3, $teacher);
            $pstmt->bindValue(4, $sub_code);
            $x = $pstmt->execute();
            return ($x > 0);
        } catch (PDOException $exc) {
            echo "Error in updateSubject method:$exc->getMessage()";
        }
    }
    
    public static function deleteSubject($sub_code) {
    try {
            $dbcon = new DbConnector();
            $con = $dbcon->connect();
            $query = "DELETE FROM subject WHERE sub_code=?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $sub_code);
            $x = $pstmt->execute();
            return ($x > 0);
        } catch (PDOException $exc) {
            echo "Error in deleteSubject method:$exc->getTraceAsString()";
        }
    }
    
    public static function showAllSubjects() {
    try {
            $sub_list = array();
            $dbcon = new DbConnector();
            $con = $dbcon->connect();
            $query = "SELECT *FROM subject";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $result = $pstmt->fetchAll(PDO::FETCH_OBJ);
        if (!empty($result)) {
                foreach ($result as $row) {
                $row = new subject($row->sub_code, $row->sub_name, $row->credits, $row->teacher);
                $sub_list[] = $row;
            }
                } else {
                    echo "p style='text-align:center'>nothing to display</p>";
                    }
                return $sub_list;

        } catch (PDOException $exc) {
            echo "Error in showAllSubjects:$exc->getTraceAsString()";
            }
        }
        
        public static function getTotalCount(){
    try{
        $dbcon = new DbConnector();
        $con = $dbcon->connect();
        $query = "SELECT COUNT(*) AS total_rows FROM subject";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $count = $pstmt->fetch(PDO::FETCH_ASSOC);
        return $count['total_rows'];
    } catch (PDOException $ex) {
        echo "Error in getRowCount method:$ex->getMessage";
      }
  }

    
}
