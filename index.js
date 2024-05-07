function init() {}

$(document).on("click", "#btnSoporte", function () {
  if ($("#rol_id").val() == 1) {
    $("#lbltitulo").html("Acceso Soporte");
    $("#btnSoporte").html("Acceso Usuario");
    $("#rol_id").val(2);
    $("#img_tipo").attr("src", "public/2.png");
  } else {
    $("#lbltitulo").html("Acceso Usuario");
    $("#btnSoporte").html("Acceso Soporte");
    $("#rol_id").val(1);
    $("#img_tipo").attr("src", "public/1.png");
  }
});

init();
