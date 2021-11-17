
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

let btn=document.querySelector("#btn"),
sidedar=document.querySelector(".sidebar"),
sidemargin=document.querySelector(".wraper"),
searchbtn=document.querySelector(".fa-search");
btn.onclick = function(){
    sidedar.classList.toggle("active");
    sidemargin.classList.toggle("margins");    
}


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
