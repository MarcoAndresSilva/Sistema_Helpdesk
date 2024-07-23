let tabla;
function init() {
  $("usuario_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar() {
  e.preventDefault();
  var formData = new FormData($("#usuario_form")[0]);
  $.ajax({
    url: "../../controller/usuario.php?op=guardaryeditar",
    tyoe: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
    },
  });
}

$(document).ready(function () {
  // console.log("asdgda");
  tabla = $("#usuario_data")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      searching: true,
      lengthChange: false,
      colRecorder: true,
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
      ajax: {
        url: "../../controller/usuario.php?op=listar",
        type: "post",
        dataType: "json",
        // data: { user_id: user_id }, // no va a lleavr data por que no recive parametros
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      yDisplayLength: 10,
      autoWidth: false,
      languaje: {
        sProcessing: "Procesanndo",
        sLengthMenu: "Mostrar MENU RIESGOS",
        sZeroRecords: "No se encontraron resultados",
        sEmpyTable: "ningun dato disoinible en la tarde",
        sInfo: "Mostrado un total de _total_registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Ultimo",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            "Activar para ordenar la columna de manera ascendente",
          aSortDescending:
            "Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable();
  ///////////////////////////////////////

  $.post(
    "../../controller/usuario.php?op=listar",
    function (respuesta, status) {
      // Parsear la respuesta JSON
      console.log(respuesta);
      var data = JSON.parse(respuesta);
      console.log(data);

      $("#usuario_data").html(data.critico);
    }
  );
});

function editar(user_id) {
  $("#mdlTitle").html("Editar Registro");
  $.post(
    "../../controller/usuario.php?op=mostrar",
    { user_id: user_id },
    function (data) {
      try {
        // datos recibidos en formato JSON
        var data = JSON.parse(data);
        console.log(data);

        // Aquí cargar los datos en los campos del modal
        $("#user_id").val(data.user_id);
        $("#user_name").val(data.user_name);
        $("#user_lastname").val(data.user_lastname);
        $("#user_mail").val(data.user_mail);
        $("#user_pass").val(data.user_pass);
        $("#rol_id").val(data.rol_id).trigger("change");
      } catch (e) {
        console.error("Error parsing JSON:", e);
        console.log("Received data:", data);
      }
    }
  );
  $("#modalmantenimiento").modal("show");
}

function eliminar(user_id) {
  console.log(user_id);
  swal(
    {
      title: "Estas seguro de eliminar el registro?",
      text: "Si cierras el ticket, No podras realizar más cambios!",
      type: "error",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Si, Cerrar Ticket!",
      cancelButtonText: "No, Cancelar",
      closeOnConfirm: true,
      closeOnCancel: true,
    },
    function (isConfirm) {
      if (isConfirm) {
        $.post(
          "../../controller/usuario.php?op=eliminar",
          { user_id: user_id },
          function (data) {}
        );

        $("#usuario_data").DataTable().ajax.reload();

        swal({
          title: "Ticket cerrado!",
          text: "Registro Eliminado.",
          type: "success",
          confirmButtonClass: "btn-success",
        });
      }
    }
  );
}

// Mostrar modal al hacer clic en el botón "Nuevo Registro"
$("#btnNuevoRegistro").on("click", function () {
  $("#mdlTitle").text("Datos Nuevo Registro");
  $("#usuario_form")[0].reset();
  $("#modalmantenimiento").modal("show");
});

init();
