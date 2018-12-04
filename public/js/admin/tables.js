$(document).ready(function() {
  /*
    Falta cambiar location.reload para que no recargue la pagina, solo la tabla
  */
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

 $(document).on('click','.eliminarMesa',function(){

   $capacity = $(this).data('capacity');
   $number = $(this).data('number');
   $state = $(this).data('state');
   
   $id = $(this).data('id');
   $.ajax({
      url: 'tables/'+$id+'/destroyValidation',
      type:'post',
      data:{_token : $('#token').val(),
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
                      url: 'tables/'+$id+'/destroy',
                      type:'post',
                      data:{_token : $('#token').val(),
                      },
                      success: function(data)
                      {
                        var obj =  JSON.parse(data);
                        if(obj.caso == '1' || obj.caso == "2" || obj.caso == "3"){
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
});
