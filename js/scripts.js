$(document).ready(function(){
    $(".menuToggle").click(function(){
        $(".menu").toggle(150, function(){
            if ($(this).css("display") === "none"){
            $(this).removeAttr("style");
               }
        });
    });
});
