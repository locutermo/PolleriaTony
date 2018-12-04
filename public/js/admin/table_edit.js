$(document).ready(function() {
 $("#btnEditarMesa").on('click',function(event) {
   //Verificar que los datos obligatorios no sean vacíos
   var editNumberTable = $('#editNumberTable').val();
   var editCapacityTable = $('#editCapacityTable').val();
   var editStateTable = $('#editStateTable').val();

  	if($(editNumberTable != "" &&  editCapacityTable!= "")){
        $id = $(this).data('id');
      	$.ajax({
           url: 'stands/update',
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
});
