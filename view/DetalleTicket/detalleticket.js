function init() {}

$(function () {
  $(".fancybox").fancybox({
    padding: 0,
    openEffect: "none",
    closeEffect: "none",
  });
});

$(document).ready(function () {
  var tic_id = getUrlParameter("ID");
  // console.log(id);
  listarDetalle(tic_id);

  $("#tic_det_descrip").summernote({
    height: 200,
  });

  $("#tic_descripUsu").summernote({
    height: 100,
  });

  $("#tic_descripUsu").summernote("disable");
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
};

$(document).on("click", "#btnEnviar", function () {
  // console.log("test");
  var tic_id = getUrlParameter("ID");
  var usu_id = $("#user_idx").val();
  var tic_det_descrip = $("#tic_det_descrip").val();

  if ($("#tic_det_descrip").summernote("isEmpty")) {
    swal("Advertencia!", "Escribe una descripción", "warning");
  } else {
    $.post(
      "../../controller/ticket.php?op=insertdetalle",
      { tic_id: tic_id, usu_id: usu_id, tic_det_descrip: tic_det_descrip },
      function () {
        listarDetalle(tic_id);
        swal("Correcto!", "Resgistro actualizado correctamente", "success");
        $("#tic_det_descrip").summernote("reset");
      }
    );
  }
});

$(document).on("click", "#btnCerrarTicket", function () {
  swal(
    {
      title: "Estas seguro de cerrar el ticket?",
      text: "Si cierras el ticket, No podras realizar más cambios!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-warning",
      confirmButtonText: "Si, Cerrar Ticket!",
      cancelButtonText: "No, Cancelar",
      closeOnConfirm: false,
      closeOnCancel: false,
    },
    function (isConfirm) {
      if (isConfirm) {
        var tic_id = getUrlParameter("ID");
        var usu_id = $("#user_idx").val();
        $.post(
          "../../controller/ticket.php?op=update",
          { tic_id: tic_id, usu_id: usu_id },
          function (data) {
            data = JSON.parse(data);
            $("#lblEstado").html(data.tic_estado);
            $("#lblNomUsuario").html(data.user_name + " " + data.user_lastname);
            $("#lblFechaCrea").html(data.fech_crea);
            $("#lblNomIdTicket").html("Detalle del Ticket Nº " + data.tic_id);

            $("#cat_name").val(data.cat_name);
            $("#tic_titulo").val(data.tic_titulo);
            $("#tic_descripUsu").summernote("code", data.tic_descrip);
            // console.log(data.tic_descrip);
          }
        );
        listarDetalle(tic_id);
        swal({
          title: "Ticket cerrado!",
          text: "El ticket ha sido cerrado con exito.",
          type: "success",
          confirmButtonClass: "btn-success",
        });
      } else {
        swal({
          title: "Cancelar",
          text: "El ticket aún está abierto :)",
          type: "error",
          confirmButtonClass: "btn-danger",
        });
      }
    }
  );
});

function listarDetalle(tic_id) {
  $.post(
    "../../controller/ticket.php?op=listardetalle",
    { tic_id: tic_id },
    function (data) {
      // console.log(data);
      $("#lblDetalle").html(data);
    }
  );

  $.post(
    "../../controller/ticket.php?op=mostrar",
    { tic_id: tic_id },
    function (data) {
      data = JSON.parse(data);
      $("#lblEstado").html(data.tic_estado);
      $("#lblNomUsuario").html(data.user_name + " " + data.user_lastname);
      $("#lblFechaCrea").html(data.fech_crea);
      $("#lblNomIdTicket").html("Detalle del Ticket Nº " + data.tic_id);

      $("#cat_name").val(data.cat_name);
      $("#tic_titulo").val(data.tic_titulo);
      $("#tic_descripUsu").summernote("code", data.tic_descrip);
      // console.log(data.tic_descrip);

      console.log(data.tic_estado_texto);
      if (data.tic_estado_texto == "cerrado") {
        $("#pnlDetalle").hide();
      }
    }
  );
}

init();
