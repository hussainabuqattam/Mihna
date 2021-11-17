//login
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

$(".ratingJS").on("click", function() {
    console.log($(this).attr("id"))
});