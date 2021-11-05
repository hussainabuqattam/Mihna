<?php 
      include "include/header.php";
      include "include/nav.php";
?>
    <div class="testbox">
        <form action="/">
            <div class="banner">
              <h1>أضافة حرفة</h1>
            </div>
            <div class="item">
                <label for="name">اسم الحرفة المقدمة :</label>
                <input id="name" type="text" name="name" required placeholder="احمد للسباكة"/>
            </div>
            <div class="item">
                <label>نوع الحرفة المقدمة :</label>
                <select class="custom-select" id="validationTooltip04"style="width:99%" required>
                <option selected value="" disabled selected>نوع الحرفة</option>
                <option>حرفة النجارة</option>
                <option>حرفة السباك </option>
                <option>عامل منزل</option>
                <option>حرفة حداد</option>
                <option>مبرمج</option>
                <option>حرف منزلية</option>
                </select>
            </div>
            <div class="item">
                <label for="email">الخبرة :</label>
                <input id="email" type="text" name="text" required placeholder="25 سنة"/>
            </div>
            <div class="item">
                <label for="attendees">ساعات الدوام:</label>
                <div class="flax">
                <div class="item">
                    <p>بدء الدوام</p>
                    <select>
                    <option selected value="" disabled selected></option>
                    <option value="8A" >8 AM</option>
                    <option value="9A">9 AM</option>
                    <option value="10A">10 AM</option>
                    <option value="11A">11 Am</option>
                    <option value="12P">12 Pm</option>
                    <option value="1P">1 Pm</option>
                    <option value="2P">2 Pm</option>
                    <option value="3P">3 Pm</option>
                    <option value="4P">4 Pm</option>
                    <option value="5P">5 Pm</option>
                    <option value="6P">6 Pm</option>
                    <option value="7P">7 Pm</option>
                    <option value="8P">8 Pm</option>
                    </select>
                </div>
                <div class="item">
                    <p>انتهاء الدوام</p>
                    <select>
                    <option selected value="" disabled selected></option>
                    <option value="8A" >8 AM</option>
                    <option value="9A">9 AM</option>
                    <option value="10A">10 AM</option>
                    <option value="11A">11 Am</option>
                    <option value="12P">12 Pm</option>
                    <option value="1P">1 Pm</option>
                    <option value="2P">2 Pm</option>
                    <option value="3P">3 Pm</option>
                    <option value="4P">4 Pm</option>
                    <option value="5P">5 Pm</option>
                    <option value="6P">6 Pm</option>
                    <option value="7P">7 Pm</option>
                    <option value="8P">8 Pm</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="item">
                <label for="position">الموقع/العنوان :</label>
                <input id="position" type="text" name="position" required placeholder="عمان/شارع الملكة رانيا"/>
            </div>
            <div class="item">
                <label for="department">اعمال سابقة :</label>
                <input id="department" type="text" name="department" required placeholder="www.ahmad.com"/>
            </div>
            <div class="item">
                <label for="department">الملاحظات :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="item">
                <label for="phone">رقم الهاتف :</label>
                <input id="phone" type="number" placeholder="(XXX) XXX-XXXX"  name="phone" required/>
            </div>
            <label for="exampleFormControlFile1">صورة الحرفة :</label>
                <div>
                    <div class="upload-add" id="upload-add-serves">
                        <img src="https://placehold.co/300x300" alt="img-upload" name="img" class="rounded imguploadserves" id="imguploadserves">
                    </div>
                    <input name="upload" type="file" onchange="readUrl(this)"class="inpfile" id="inpfile" style="display:none;">
                    <label for="inpfile"class="input-files"><i class="fas fa-upload"></i>&nbsp;اضافة صورة</label>
                </div>
                <hr>
            <div class="btn-block">
              <button type="submit" href="/">اضافة الحرفة</button>
            </div>
        </form>
    </div>
<?php include "include/footer.php";?>

<script>
       function readUrl(input){
    var uploadimg = document.getElementById("imguploadserves");

       if(input.files){
           var reader = new FileReader();
           reader.readAsDataURL(input.files[0]);
           reader.onload=(download)=>{
            uploadimg.src = download.target.result;

           }
       }
   }
</script>
