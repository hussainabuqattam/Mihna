<!--start navbar-->
<nav class="navbar navbar-edit navbar-expand-lg navbar-light <?= $titlePage == "Home Page" ? "Home" : "" ?>">
    <div class="container">
        <a class="navbar-brand logo" href="#"><span>M</span>IHNA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['ID'])): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-plus-circle"></i>أضافة حرفة</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-boxes"></i>الحرف في الموقع</a>
                </li>
                <?php if(isset($_SESSION['ID'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user-alt"></i>الصفحة الشخصية</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-phone"></i>التواصل معنا</a>
                </li>
                <?php if(isset($_SESSION['ID'])): ?>
                    <li class="nav-item">
                        <a href="logout.php" type="button" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i>تسجيل الخروج</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="Login.php" type="button" class="btn btn-outline-light" style="padding: 0.375rem 0.72rem;"><i class="fas fa-sign-out-alt"></i>تسجيل الدخول</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
    <!--end navbar-->