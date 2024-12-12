<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include("config.php");
    $c1 = new CoursesConfig();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $course_name = $_REQUEST['course_name'];
        $description = $_REQUEST['description'];

        if(empty($course_name) || empty($description)){
            $arr['err'] = "All fields are required!";
            echo json_encode($arr);
            exit;
        }

        $res = $c1->insertData($course_name, $description);
        if($res){
            $arr['status'] = "Course data insert successfully!!";
            echo json_encode($arr);
        }else{
            $arr['err'] = "Course data insert failed!!";
            echo json_encode($arr);
        }
    }
    else{
        $arr['msg'] = "Only POST method is allowed !!";
        echo json_encode($arr);
    }

?>