$(document).ready(function(){
    var scroll_pos = 0;
    $(document).scroll(function() {
        scroll_pos = $(this).scrollTop();
        if(scroll_pos > 650) {

            $("#nav-layout").css('background-color', 'black');
        } else {
            $("#nav-layout").css('background-color', '');
        }
    });
});
