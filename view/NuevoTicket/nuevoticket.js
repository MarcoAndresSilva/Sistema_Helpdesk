function init() {
  $("#ticket_form").on("submit", function (e) {
    guardar_y_editar(e);
  });
}

$(document).ready(function () {
  $("#tic_descrip").summernote({
    height: 200,
  });

  $.post("../../controller/categoria.php?op=combo", function (data, status) {
    // console.log(data, status);
    $("#cat_id").html(data);
  });
});

function guardar_y_editar(e) {
  e.preventDefault();
  var formData = new FormData($("#ticket_form")[0]);
  if ($("#tic_descrip").summernote("isEmpty") || $("#tic_titulo").val() == "") {
    swal("Advertencia!", "Campos Vacios", "warning");
  } else {
    $.ajax({
      url: "../../controller/ticket.php?op=insert",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        console.log(datos);
        $("#cat_id").val("");
        $("#tic_titulo").val("");
        $("#tic_descrip").summernote("reset");
        swal("Correcto!", "Resgistrado Correctamente", "success");
      },
    });
  }
}

init();
