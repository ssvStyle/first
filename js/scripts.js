$(document).ready(function(){
    $(".menuToggle").click(function(){
        $(".menu").toggle(150, function(){
            if ($(this).css("display") === "none"){
            $(this).removeAttr("style");
               }
        });
    });
});

function checkInput (form) {
				var choiceTime = form.hour.value;
				if(choiceTime !== ""){
					document.getElementById("Button").setAttribute('value', "Записаться");
					document.getElementById("Button").removeAttribute("disabled");
				};
			};