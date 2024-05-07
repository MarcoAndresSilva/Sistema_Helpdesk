var tabla;
var usu_id = $("#user_idx").val();
var rol_id = $("#rol_idx").val();

function init() {}

$(document).ready(function () {
  if (rol_id == 1) {
    // console.log(usu_id);
    tabla = $("#ticket_data")
      .dataTable({
        aProcessing: true,
        aServerSide: true,
        dom: "Bfrtip",
        searching: true,
        lengthChange: false,
        colRecorder: true,
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        ajax: {
          url: "../../controller/ticket.php?op=listar_by_user",
          type: "post",
          dataType: "json",
          data: { usu_id: usu_id },
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
      .dataTable();
  } else {
    console.log(usu_id);
    tabla = $("#ticket_data")
      .dataTable({
        aProcessing: true,
        aServerSide: true,
        dom: "Bfrtip",
        searching: true,
        lengthChange: false,
        colRecorder: true,
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        ajax: {
          url: "../../controller/ticket.php?op=listar",
          type: "post",
          dataType: "json",
          // data: { usu_id: usu_id },// no va a lleavr data por que no recive parametros
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
      .dataTable();
  }
});

function ver(tic_id) {
  // console.log(tic_id);
  window.open(
    "http://localhost/sistema_helpdesk/view/DetalleTicket/?ID=" + tic_id + ""
  );
}

init();
