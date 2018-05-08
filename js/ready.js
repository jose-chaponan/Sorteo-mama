$(document).ready(function () { 
    $("#formulario").on('submit', function (event) {
        event.preventDefault();
        setTimeout(function () {
            var success_frm = $("#success_frm").val();
            if (success_frm == "listo") {
                $("#mensaje_frm").html('<div class="content w_60 section_top_center"><img src="images/logo.svg" alt="Larcomar" width="10%" style="min-width:150px; margin-bottom: 30px;"> <h2 class="w_100 align_center">GRACIAS POR PARTICIPAR</h2> <p class="w_100 align_center">Mucha suerte</p></div>').addClass('listo_mensaje');
            }
            setTimeout(function () {
                $(".content").animate({ "opacity": 1 }, 300);
            }, 300);
        }, 500);
    });
});