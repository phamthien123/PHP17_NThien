$(function() {
    $(".remove").click(function(e){
        e.preventDefault();//ngăn sự kiện mặc dịnh
       if (confirm("Click OK to continue?")){
         window.location.href = $(this).attr("href");
       }
    });
 });
