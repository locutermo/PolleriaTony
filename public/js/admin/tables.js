$(document).ready(function() {
  
  updateTable();
  showEditTable();
  createTable();
  deleteTable();

  

 
});


function deleteTable(){
  $(document).on('click','.eliminarMesa',function(){   
    var id = $(this).data('id');
    $.ajax({
       url: 'tables/'+id+'/destroyValidation',
       type:'post',
       data:{_token : $('#token').val(),
       id : id 
       },
       success: function(data)
       {
          var obj =  JSON.parse(data);
          if(obj.caso == '1' || obj.caso == "2"){
            swal({
                title: obj.titulo,
                text: obj.texto,
                type: "error",
            });
          }
          if(obj.caso == '0'){
              swal({
                title: obj.titulo,
                text: obj.texto,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí , Eliminar !",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false
              }, function(isConfirm){
                if (isConfirm) {
                     $.ajax({
                       url: 'tables/'+id+'/destroy',
                       type:'post',
                       data:{_token : $('#token').val(),
                       id : id ,
                       },
                       success: function(data)
                       {
                         var obj =  JSON.parse(data);
                         if(obj.caso == '1' || obj.caso == "2"){
                            swal({
                              title: obj.titulo,
                              text: obj.texto,
                              type: "error",
                            });
                          }else{
                            swal({
                              title: obj.titulo,
                              text: obj.texto,
                              type: "success",
                            },function(){
                              console.log("Eliminado");
                              location.reload();
                            });
                          }
                       },
                     });
                } else {
                    swal("Cancelado", "La operación fue cancelada", "error");
                }
            });
          }
       }
     });
 });
}

function showEditTable(){
  $(document).on('click','.editarMesa',function(){
    $id = $(this).data('id');
     //  $url = '../plugins/images/busy.gif',
     //  $('div.block5').block({
     //        message: '<h4><img src="'+$url+'"/> Cargando...</h4>',
     //        css: {
     //            border: '1px solid #fff'
     //        }
     //    });
      $(".div-edit").load('tables/'+$id+'/edit');
 
  });
}

function createTable(){
  $("#btnCrearMesa").on('click',function(event) {
    //Verificar que los datos obligatorios no sean vacíos
    var inputNumberTable = $('#inputNumberTable').val();
    var inputCapacityTable = $('#inputCapacityTable').val();
    var inputStateTable = $('#inputStateOfTable').val();
    
  	if(inputNumberTable != "" && inputStateTable != "" && inputCapacityTable != ""){
      $.ajax({
           url: 'tables/store',
           type:'post',
           data:{
           		_token : $('#token').val(),
           		number: inputNumberTable,
              capacity: inputCapacityTable,
              state: inputStateTable,
           },
           success: function(data)
           {
             var obj =  JSON.parse(data);
             if(obj.caso == '1'){
             	swal({
                  title: obj.titulo,
                  text: obj.texto,
                  type: "error",
                });
             }else{
             	swal({
                  title: obj.titulo,
                  text: obj.texto,
                  type: "success",
                },function(){
                	console.log("Mesa registrada exitosamente");
                  location.reload();
                });
              }
            }
        });
  	}else{
      swal({
          title: "Error al registrar la Mesa",
          text: "Revise si hay campos vacíos o repetidos",
          type: "error",
        });
    }
  });
}

function updateTable(){
  $("#btnEditTable").on('click',function(event) {
    
    //Verificar que los datos obligatorios no sean vacíos
    var editNumberTable = $('#editNumberTable').val();
    var editCapacityTable = $('#editCapacityTable').val();
    var editStateTable = $('#editStateTable').val();
 
     if($(editNumberTable != "" &&  editCapacityTable!= "")){
         $id = $(this).data('id');
         $.ajax({
            url: 'tables/update',
            type:'post',
            data:{
                _token : $('#token').val(),
                id: $id,
               number: editNumberTable,
               capacity: editCapacityTable,
               state: editStateTable,
               
            },
            success: function(data)
            {
              var obj =  JSON.parse(data);
              if(obj.caso == '1'){
                swal({
                   title: obj.titulo,
                   text: obj.texto,
                   type: "error",
                 });
              }else{
                swal({
                   title: obj.titulo,
                   text: obj.texto,
                   type: "success",
                 },function(){
                   console.log("Stand guardado");
                     location.reload();
                 });
              }
            }
         });
     }
   });
}