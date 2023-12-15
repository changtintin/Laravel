/*

    Functions

*/
$(window).on('load', function(){
    setTimeout(function(){
        $(".window-loader").css('display','none');
        $("#main-content").css('display','block');        
    }, 500);
});
$(document).ready(function () {
    $("#scrollspyTop").click(function () {
        // 有些瀏覽器只支援html，有些只支援body 所以兩個都寫進去
        $('html,body').animate({
            scrollTop: 0,
        }, 100)
    });

    $(".circle-btn").on("click", function (event) {
        var id = this.id;
        setTimeout(300);
    });

    $("#PagePrinterBtn").on("click", function () {
        window.print();
    })

    $('#summernote').summernote({
        placeholder: '請輸入內容',
        maximumImageFileSize: 1000*1024, // 500 KB
        height: 500,
        callbacks:{
            onImageUploadError: function(msg){
                console.log(msg + ' (1 MB)');
                alert("上傳失敗 檔案大小不得超過1 MB");
            }
        }        
    });

    /* 
        if mouse move to the nav, show the search bar
    */
    $(".navbar").mouseover(function(){
        $("#search_bar").show();
    });
    $(".navbar").mouseout(function(){
        $("#search_bar").hide();
    });

    $(".logo-container").mouseover(function(){
        $("#search_bar").show();
    });    

    $("#search_bar").mouseover(function(){
        $("#search_bar").show();
    });

    $("#search_bar").mouseout(function(){
        $("#search_bar").hide();
    });

    $("#table").on('change', function(){
        if( $("#table").val() == 'display'){
            $("#cover_form_field, #typeFormField").hide();
        }
        else{
            $("#cover_form_field, #typeFormField").show();
        }
    });
});

  
function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 100;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        }
        else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal);

// Show the file names https://www.raymondcamden.com/2013/09/10/Adding-a-file-display-list-to-a-multifile-upload-HTML-control 
var selDiv = "";
document.addEventListener("DOMContentLoaded", init, false);

function init() {
    var appendixField = document.querySelector('#appendix');
    if(appendixField){
        appendixField.addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }
}

class handleFileSelect {
    constructor(e) {
        if (!e.target.files) return;
        selDiv.innerHTML = "";
        var files = e.target.files;
        var fileLimit = 4;

        for (var i = 0; i < files.length; i++) {
            var f = files[i];
            var size = f.size / 1048576;

            if (fileLimit - size > 0) {
                fileLimit -= size;
                selDiv.innerHTML += f.name + ":  " + size.toFixed(2) + "MB <br>";
            }
            else {
                alert("上傳失敗 檔案大小超過限制 (2 MB)");

                // file[i].value = null IS INVALID STATEMENT
                this.value = '';
                selDiv.innerHTML = '';
            }
        }
    }
}



