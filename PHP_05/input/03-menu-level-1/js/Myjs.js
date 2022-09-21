$( document ).ready(function() {
    //tìm url
    var href        = document.location.href;
    var currentFile = href.substr(href.lastIndexOf('/') + 1);
    if (currentFile == '' || currentFile == undefined){
        currentFile = 'index.php';
    }
    //tìm thẻ a
    var currentFMenu = $('a[href="' + currentFile + '"]');
    // quay về thẻ li addClass
    currentFMenu.parent().addClass('active'); 
});