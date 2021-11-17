<?php

include "include/init.php";

if(!isset($_SESSION['ID']))
Redirect("index.php");

if(!isset($_GET['id']) || empty($_GET['id'])){
    Redirect("index.php");
}

$id = $_GET['id'];

$stmt = $connect->prepare("SELECT * FROM crafts WHERE id = ?");
$stmt->execute([$id]);
$craft = $stmt->fetch();

if($craft['user_id'] != $_SESSION['ID'])
Redirect("index.php");

$stmt2 = $connect->prepare("DELETE FROM crafts WHERE id = ?");
$result = $stmt2->execute(array($id));

if($result == true) {
    Redirect("index.php");
}


include "include/footer.php";