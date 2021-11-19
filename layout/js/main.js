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
    var craftId = $(this).parent().attr("id"),
    numberStar = $(this).attr("id");
    var thisButton = $(this);

    $.ajax({
        method:"post",
        url:"ajax.php",
        data:{craft_Id: craftId, number_Star:numberStar},
        success:function(result) {
            var siblings = thisButton.siblings("a.select");
            siblings.removeClass("select");
            thisButton.addClass("select");
            $(".rating-text").text("Thanks you For Rating! 😇")
        }
    });
    
});