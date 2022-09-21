$( document ).ready(function() {
    //tìm url
    var href        = document.location.href;
    var currentFile = href.substr(href.lastIndexOf('/') + 1);
    if (currentFile == '' || currentFile == undefined){
        currentFile = 'index.php';
    }
    //tìm thẻ a
    var currentFMenu = $('a[href="' + currentFile + '"]');
    //tìm data-parent
    var menu2 = currentFMenu.parent().attr('data-parent');
    if (menu2 !== undefined){
        //menu 2,3,... 
        $('li[data-name="' + menu2 + '"]').addClass('active');
    }
    else{
        currentFMenu.parent().addClass('active'); 
    }
});