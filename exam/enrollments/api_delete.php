<?php

header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include("config.php");
$c1 = new EnrollmentsConfig();

if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $res = file_get_contents("php://input");
    parse_str($res,$data);
    // $id = $data["id"];
    $result = $c1->removeData();

    if($result)
    {
        $arr['status']='Enrollments deleted Successfully !';
    }
    else{
        $arr['error']= 'Failed to delete Enrollment !';
    }
}else{
    $arr['err'] = "Only DELETE method is allowed !!";
}

echo json_encode($arr);

?>