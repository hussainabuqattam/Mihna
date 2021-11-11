<?php
  $titlePage = "Contact";
   include "include/init.php";
   include "include/header.php";
   include "include/nav.php";
   
   if(isset($_POST['save'])) {
     $name= $_POST['name'];
     $email = $_POST['email'];
     $body = $_POST['body'];

     $validation = validationConnect($_POST);


     if($validation === true){
			$stmt = $connect->prepare("INSERT INTO contact SET name = ?, email = ?, message = ?");
			$result = $stmt ->execute([$name, $email, $body]);
	
			if($result == true) {
				$_SESSION['message'] = "تم ارسال الرسالة بنجاح";
			}
	
		}

   }
 ?>
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-success mt-5" style="width:35%;margin:0 auto;">
        <?= $_SESSION['message'] ?>
    </div>
<?php unset($_SESSION['message']); endif; ?>
<form action="" class="contact" method="POST">
  <h1><i class="fas fa-phone"></i>التواصل معنا</h1>

  <input name="name" type="text" placeholder="الاسم" id="name" required/>
  
  <input name="email" type="email" placeholder="البريد الالكتروني" id="email" required/>
  
  <textarea name="body" placeholder="الرسالة"></textarea>
   
   <input type="submit" name="save" value="Send" id="button-blue"/>
</form>

<?php include "include/footer.php"; ?>




