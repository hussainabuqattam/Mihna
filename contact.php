<?php
  $titlePage = "contact";
   include "include/init.php";
   include "include/header.php";
   include "include/nav.php";
 ?>

<form action="" class="contact">
  <h1><i class="fas fa-phone"></i>التواصل معنا</h1>

  <input name="name" type="text" placeholder="Name" id="name" required/>
  
  <input name="email" type="email" placeholder="Email" id="email" required/>
  
  <textarea name="text" placeholder="Message"></textarea>
   
   <input type="submit" value="Send" id="button-blue"/>
</form>

<?php include "include/footer.php"; ?>




