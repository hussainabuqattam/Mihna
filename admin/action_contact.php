<?php
include "include/init.php";

if(!isset($_SESSION['admin-ID']))
        Redirect("login.php");

$action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("users.php");

if($action == "delete"){

    if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("contact.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from contact WHERE id = ?");
        $stmt->execute(array($id));
        $getCategory = $stmt->fetch();

        if($getCategory == false)
            Redirect("contact.php");

        $stmt = $connect->prepare("DELETE FROM contact WHERE id = ? LIMIT 1");
        $result = $stmt->execute(array($id));

        if($result == true) {
            $_SESSION['message'] = "تم حذف الرسالة بنجاح";
            Redirect("contact.php");
        }

}else{
    Redirect("contact.php");
}

include "include/footer.php"; 

?>