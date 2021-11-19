<nav class="navbar navbar-expand-lg navbar-light bg-light top-nav-admin">
      <a class="navbar-brand"style="font-family: 'Dancing Script';color:#fff;font-size: 27px;font-weight: 500;margin-right: 47%;" href="/Mihna"><span style="color:#C6AD8F;">M</span>IHNA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<!--start disgin dashbord-->
<div class="dashbord-edit">
<div class="sidebar">
    <div class="logo_content">
        <i class="fas fa-bars" id="btn" ></i>
    </div>
    <ul class="nav_list">
     <li>
         <a class="<?= $titlePage == "لوحة التحكم" ? "actives" : "" ?>" href="index.php">

         <i class="fas fa-th-large"></i>
                  <span class="links_name">لوحة التحكم</span>

            </a>
      <span class="toolt">لوحة التحكم</span>
     </li>
     <li>
         <a class="<?= $titlePage == "المستخدمين" ? "actives" : "" ?>" href="users.php">
         <i class="fas fa-users"></i>
             <span class="links_name">المستخدام</span>
            </a>
      <span class="toolt">المستخدم</span>
     </li>
     <li>
         <a class="<?= $titlePage == "الحرف المقدمة" ? "actives" : "" ?>" href="categories.php">
         <i class="fas fa-pencil-ruler"></i>
             <span class="links_name">الحرف المقدمة</span>
            </a>
     <span class="toolt">الحرف المقدمة</span>
     </li>
     <li>
         <a class="<?= $titlePage == "الحرف في الموقع" ? "actives" : "" ?>" href="crafts.php">
         <i class="fas fa-tools"></i>
             <span class="links_name">الحرف في الموقع</span>
            </a>
      <span class="toolt">الحرف في الموقع</span>
     </li>
     <li>
         <a class="<?= $titlePage == "تواصل معنا" ? "actives" : "" ?>" href="contact.php">
         <i class="fas fa-phone-square"></i>             
            <span class="links_name">التواصل</span>
            </a>
      <span class="toolt">التواصل</span>
     </li>
     <li>
         <a class="<?= $titlePage == "الصفحة الشخصية" ? "actives" : "" ?>" href="profile.php">
         <i class="far fa-user"></i>
             <span class="links_name">الصفحة الشخصية</span>
            </a>
      <span class="toolt">الصفحة الشخصية</span>
     </li>
     <li>
         <a class="<?= $titlePage == "مشرفي النظام" ? "actives" : "" ?>" href="admin.php">
         <i class="fas fa-users"></i>
             <span class="links_name">مشرفي النظام</span>
            </a>
      <span class="toolt">مشرف النظام</span>
     </li>
     <li>
         <a href="logout.php">
         <i class="fas fa-sign-out-alt"></i>
            <span class="links_name">تسجيل الخروج</span>
            </a>
      <span class="toolt">تسجيل الخروج</span>
     </li>
    </ul>
    </div>
 
</div>
</div>

