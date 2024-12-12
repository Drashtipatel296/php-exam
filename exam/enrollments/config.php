<?php

class EnrollmentsConfig{
    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "exam";
    private $conn;

    public function __construct(){
        $this->conn = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
    }

    public function insertData($student_id, $course_id, $enrollment_date){
        $query = "INSERT INTO enrollments (student_id, course_id, enrollment_date) VALUES ('$student_id', '$course_id', '$enrollment_date')";
        $insertData = mysqli_query($this->conn, $query);
        return $insertData;
    }

    public function removeData(){
        $query = "DELETE FROM enrollments";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }
}

?>