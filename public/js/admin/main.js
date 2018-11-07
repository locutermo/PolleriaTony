$(document).ready(function(){

    instansDT($('.datatable'));
    initSelect();
    initDTExport($('.table-export-pdf'));
});


function initSelect(){
    $(".select2").select2();
   
}

function instansDT(element){
    element.DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "stateSave": false,
        "language" : {
            "sProcessing" : "Procesando...",
            "sLenghtMenu" : "Mostrar _MENU_ registros",
            "sZeroRecords" : "No se encontraron resultados",
            "sEmptyTable" : "Ningún dato disponible en esta tabla",
            "sInfo" : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty" : "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered" : "(filtrado de un total de _MAX_ registros",
            "sInfoPosFix" : "",
            "sSearch" : "Buscar: ",
            "sUrl" : "" ,
            "sInfoThousands": ",",
            "sLoadingRecords" : "Cargando...",
            "oPaginate": {
                "sFirst" : "Primero",
                "sLast" : "Último",
                "sNext" : "Siguiente" ,
                "sPrevious" : "Anterior"
            },
            "oAria" : {
                "sSortAscending" : ": Actibar para ordenar la columna de manera ascendente",
                "sSordtDescending" : ": Activar para ordenar la columna de manera descendente"
            },
            "lengthMenu" : "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron registros",
            "info" : "Página _PAGE_ de _PAGES_",
            "infoEmpty" : "No hay registros"
        },
    });
}


/**
 * Nota: Se debe agregar la clase ".table-export-pdf" a un div que contenga a la tabla 
 * @param {String:class} content_tables
 */
function insertIconIn(content_tables){
    $(content_tables).find('.dt-button').prepend('<i class="fa fa-file-pdf-o"></i>');
    $(content_tables).find('.dt-button span').replaceWith(' Descargar PDF');
}



/**
 * Esta funcion inicializa un DataTable Export y añade un icono para exportar en PDF 
 *
 * @param {*} element
 */
function initDTExport(element){
    element.DataTable({
      
      "language" : {
        "sProcessing" : "Procesando...",
        "sLenghtMenu" : "Mostrar _MENU_ registros",
        "sZeroRecords" : "No se encontraron resultados",
        "sEmptyTable" : "Ningún dato disponible en esta tabla",
        "sInfo" : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty" : "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered" : "filtrado de un total de _MAX_ registros",
        "sInfoPosFix" : "",
        "sSearch" : "Buscar: ",
        "sUrl" : "" ,
        "sInfoThousands": ",",
        "sLoadingRecords" : "Cargando...",
        "oPaginate": {
            "sFirst" : "Primero",
            "sLast" : "Último",
            "sNext" : "Siguiente" ,
            "sPrevious" : "Anterior"
        },
        "oAria" : {
            "sSortAscending" : ": Activar para ordenar la columna de manera ascendente",
            "sSordtDescending" : ": Activar para ordenar la columna de manera descendente"
        },
        "lengthMenu" : "Mostrar _MENU_ registros por página",
        "zeroRecords": "No se encontraron registros",
        "info" : "Página _PAGE_ de _PAGES_",
        "infoEmpty" : "No hay registros"
    },            
          dom: 'Bfrtip'
          , buttons: [
          'pdf']

      });

    insertIconIn('#DataTables_Table_0_wrapper');
}