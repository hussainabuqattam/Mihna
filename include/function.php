<?php

function Redirect($path) {
    header("Location: " . $path);
}

function validationCraft($post, $files = []) {
    $error = [];

    if(empty($post['name'])){
        $error['name'] = "لا يجوز أن يكون الاسم فارغًا";
    }else if(strlen($post['name']) < 5){
        $error['name'] = "يجب أن يحتوي الاسم على 5 أحرف على الأقل";
    }

    if(empty($post['experience'])){
        $error['experience'] = "لا يمكن أن تكون الخبرة فارغة";
    }else if(strlen($post['experience']) < 5){
        $error['experience'] = "يجب أن تحتوي الخبرة على 5 أحرف على الأقل";
    }

    if(empty($post['start_work'])){
        $error['start_work'] = "من فضلك ، حدد بدء العمل";
    }

    if(empty($post['end_work'])){
        $error['end_work'] = "من فضلك ، حدد إنهاء العمل";
    }

    if(empty($post['address'])){
        $error['address'] = "لا يجوز أن يكون العنوان فارغًا";
    }elseif(strlen($post['address']) < 10){
        $error['address'] = "يجب أن يحتوي العنوان على 10 أحرف على الأقل";
    }

    if(empty($post['phone_number'])){
        $error['phone_number'] = "لا يمكن أن يكون رقم الهاتف فارغًا";
    }else if(!preg_match("/^07(7|8|9)[0-9]{7}$/", $post['phone_number'])) {
        $error['phone_number'] = "رقم الهاتف غير صحيح ، يجب أن يكون مثل هذا النمط 1234567(9|8|7)07";
    }

    if(empty($post['email'])) {
        $error['email'] = "لا يجوز أن يكون البريد الإلكتروني فارغًا";
    }else if(!preg_match("/^([\w0-9_\-\.]+)@([\w\-]+\.)+[\w]{2,6}$/", $post['email'])) {
        $error['email'] = "البريد الإلكتروني غير صحيح ، يجب أن يكون مثل هذا النمط (example@example.com)";
    }

    if(empty($files['image']['name'])){
        $error['image'] = "من فضلك ، اختر الصورة";
    }

    if(empty($error)){
        return true;
    }else{
        return $error;
    }

}

function validationUser($post) {

    $error = [];

    if(empty($post['Fname'])) {
        $error['FirstName'] = "لا يجوز أن يكون الاسم الأول فارغًا";
    }else if(strlen($post['Fname']) < 3) {
        $error['FirstName'] = "يجب أن يحتوي الاسم الأول على 3 أحرف على الأقل";
    }

    if(empty($post['Lname'])) {
        $error['LastName'] = "لا يجوز أن يكون الاسم الأخير فارغًا";
    }else if(strlen($post['Lname']) < 3) {
        $error['LastName'] = "يجب أن يحتوي اسم العائلة على 3 أحرف على الأقل";
    }

    if(empty($post['email'])) {
        $error['Email'] = "لا يجوز أن يكون البريد الإلكتروني فارغًا";
    }else if(!preg_match("/^([\w0-9_\-\.]+)@([\w\-]+\.)+[\w]{2,6}$/", $post['email'])) {
        $error['Email'] = "البريد الإلكتروني غير صحيح ، يجب أن يكون مثل هذا النمط (example@example.com)";
    }

    if(empty($post['password'])){
        $error['Password'] = "لا يمكن أن تكون كلمة المرور فارغة";
    }else if($post['confirm_password'] !== $post['password']){
        $error['Password'] = "كلمة المرور وتأكيد كلمة المرور غير متطابقتين";
    }

    if(empty($error)){
        return true;
    }else{
        return $error;
    }
}