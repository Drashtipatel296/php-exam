<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include("config.php");
    $c1 = new EnrollmentsConfig();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $student_id = $_REQUEST['student_id'];
        $course_id = $_REQUEST['course_id'];
        $enrollment_date = $_REQUEST['enrollment_date'];

        if(empty($student_id) || empty($course_id) || empty($enrollment_date)){
            $arr['err'] = "All fields are required!";
            echo json_encode($arr);
            exit;
        }

        $res = $c1->insertData($student_id, $course_id, $enrollment_date);
        if($res){
            $arr['status'] = "Enrollments data insert successfully!!";
            echo json_encode($arr);
        }else{
            $arr['err'] = "Enrollments data insert failed!!";
            echo json_encode($arr);
        }
    }
    else{
        $arr['msg'] = "Only POST method is allowed !!";
        echo json_encode($arr);
    }

?>