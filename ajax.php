<?php
include "include/init.php";

if(isset($_POST["number_Star"]) && isset($_POST['craft_Id'])) {
    $status = [];
    $stmt = $connect->prepare("SELECT * FROM rating WHERE craft_id = ? AND user_id = ?");
    $stmt->execute([$_POST['craft_Id'], $_SESSION['ID']]);
    $ratings = $stmt->fetch();
    if(!empty($ratings)){
        $stmt2 = $connect->prepare("UPDATE rating SET number_ratings = ? WHERE craft_id = ? AND user_id = ?");
        $result = $stmt2->execute([$_POST['number_Star'], $_POST['craft_Id'], $_SESSION['ID']]);
        if($result == true){
            $status["status"] = 0;
            $status["message"] = "success";
        }
    }else{
        $stmt2 = $connect->prepare("INSERT INTO rating SET craft_id = ?, user_id = ?, number_ratings = ?");
        $result = $stmt2->execute([$_POST['craft_Id'], $_SESSION['ID'], $_POST['number_Star']]);
        if($result == true){
            $status["status"] = 1;
            $status["message"] = "success";
        }
    }
    echo json_encode($status);
}