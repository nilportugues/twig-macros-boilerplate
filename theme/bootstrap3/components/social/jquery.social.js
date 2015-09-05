
$(document).ready(function() {
    $('a[target=popup]').click(function() {
        window.open($(this).attr("href"), "popupWindow", "width=600,height=400,scrollbars=yes");
    });
});