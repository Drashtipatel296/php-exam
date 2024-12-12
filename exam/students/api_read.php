<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include("config.php");
$c1 = new Config();

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $res = $c1->showData();
    $data = [];

    while($row = mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    echo json_encode(['data' => $data]);
}else{
    echo json_encode(['error' => "Only GET method is allowed."]);
}

?>