$(".pagination").find(".page-item").on("click", function () {
     
     let reqpageid = $(this).data("req");
     let x = document.getElementById(`${reqpageid}`)
   if (reqpageid) {
     $(x).siblings().css("display", "none");
     $(x).css("display", "block");

        
   }

})
function screen(event) {
     let obj=event.target.parentElement.parentElement
     html2canvas(obj).then(function (canvas) {
     // var anchor = document.createElement("a");
     // anchor.href = canvas.toDataURL("image/png");
     // anchor.download = "Request.PNG";
          // anchor.click();
          $("#output").append(canvas);

          var canv = canvas.toDataURL().replace("data:image/png;base64,", "");
          downloadBase64File('image/png', canv, 'image');
          // obj.appendChild(canvas);
     }); 
}
$(".send-for-approval").on("click", function () {
$(this).css("display", "none");
$(this).siblings().css("display", "block");
})

var canv;
function takeshot() {
          
//      if ($(".name-input").val()==="") {
// return          
//      }
     let div = document.getElementById('req-1');
     console.log(div);
          html2canvas(div).then(
               function (canvas) {
                    $("#output").empty(); 
                    $(canvas).addClass("w-100")
                    $("#output").append(canvas);
                    $('#exampleModal').modal('show');
         
                    var canv = canvas.toDataURL().replace("data:image/png;base64,", "");


                    $(".download").on("click", function () {
     
                         downloadBase64File('image/png', canv, 'image');
                         
})
               })
     }
      function downloadBase64File(contentType, base64Data, fileName){
        const linkSource = `data:${contentType};base64,${base64Data}`;
        const downloadLink = document.createElement("a");
        downloadLink.href = linkSource;
        downloadLink.download = fileName;
        downloadLink.click();
}



