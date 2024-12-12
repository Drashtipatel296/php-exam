<?php

class CoursesConfig{
    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "exam";
    private $conn;

    public function __construct(){
        $this->conn = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
    }

    public function insertData($course_name, $description){
        $query = "INSERT INTO courses (course_name, description) VALUES ('$course_name', '$description')";
        $insertData = mysqli_query($this->conn, $query);
        return $insertData;
    }

    public function updateData($id, $description)
    {
        $query = "UPDATE courses SET description='$description' WHERE id=$id";
        $update = mysqli_query($this->conn, $query);
        return $update;
    }
}

?>