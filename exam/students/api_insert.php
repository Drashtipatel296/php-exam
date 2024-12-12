<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include("config.php");
    $c1 = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];

        if(empty($name) || empty($email) || empty($phone)){
            $arr['err'] = "All fields are required!";
            echo json_encode($arr);
            exit;
        }else if(strlen($phone) != 10){
            $arr['error'] = "Phone number must be exactly 10 digits!";
            echo json_encode($arr);
            exit;
        }

        $res = $c1->insertData($name, $email, $phone);
        if($res){
            $arr['status'] = "Students data insert successfully!!";
            echo json_encode($arr);
        }else{
            $arr['err'] = "Students data insert failed!!";
            echo json_encode($arr);
        }
    }
    else{
        $arr['msg'] = "Only POST method is allowed !!";
        echo json_encode($arr);
    }

?>