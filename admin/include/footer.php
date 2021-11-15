
    <script src="layout/js/jquery-3.5.1.min.js"></script>
    <script src="layout/js/bootstrap.min.js"></script>
    <script src="layout/js/main.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
         let btn=document.querySelector("#btn"),
        sidedar=document.querySelector(".sidebar"),
        sidemargin=document.querySelector(".wraper"),
        searchbtn=document.querySelector(".fa-search");
        btn.onclick = function(){
        sidedar.classList.toggle("active");
        sidemargin.classList.toggle("margins");    
           }
    </script>
    </body>
</html>