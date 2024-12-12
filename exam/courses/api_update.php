<?php

header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");

include("config.php");
$c1 = new CoursesConfig();

if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH"){

    $res = file_get_contents("php://input");
    parse_str($res, $data);
    $id = $data["id"];
    $description = $data['description'];
    $result = $c1->updateData($id, $description);

    if($result)
    {
        $arr['status']='Course description Updated Successfully !';
    }
    else{
        $arr['error']= 'Course description Updatation Failed !';
    }
}else{
    $arr['err'] = "Only PUT & PATCH method is allowed !!";
}

echo json_encode($arr);

?>