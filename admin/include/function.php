<?php

function Redirect($path) {
    header("Location: " . $path);
}

function validateUser($post) {
    $error = [];

    if(empty($post['first_name'])) {
        $error['FirstName'] = "لا يجوز أن يكون الاسم الأول فارغًا";
    }else if(strlen($post['first_name']) < 3) {
        $error['FirstName'] = "يجب أن يحتوي الاسم الأول على 3 أحرف على الأقل";
    }

    if(empty($post['type_user'])) {
        $error['TypeUser'] = "الرجاء تحديد نوع المستخدم";
    }

    if(empty($post['last_name'])) {
        $error['LastName'] = "لا يجوز أن يكون الاسم الأخير فارغًا";
    }else if(strlen($post['last_name']) < 3) {
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

function validateCategory($post) {
    $error = [];

    if(empty($post['name'])) {
        $error['name'] = "لا يجوز أن يكون اسم الحرفة فارغًا";
    }else if(strlen($post['name']) < 3) {
        $error['name'] = "يجب أن يحتوي اسم الحرفة على 3 أحرف على الأقل";
    }

    if(empty($error)){
        return true;
    }else{
        return $error;
    }
}