$(document).ready(function(){

    acceptOrder();

})

function acceptOrder(){
    $('.aceptarPedido').on('click',function(){
        var id = $(this).data('id');
        $(".div-information-order").load('serveOrder/'+id+'/product');

        $.ajax({
            type: "post",
            url: "serveOrder/acceptOrder",
            data: {_token : $('#token').val(),
            id : id 
            },
            success: function (response) {
              console.log('pedido aceptado');
            },error:function(response){
                console.log('error',response);
            }
        });

    });
}

function endOrder(){
    $('.btnFinalizarPedido').on('click',function(){
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "serveOrder/endOrder",
            data: {_token : $('#token').val(),
            id : id 
            },
            success: function (response) {
              swal('Operación exitosa','Se ha finalizado el pedido correctamente','success')  ;
              location.reload();
            },error:function(response){
                console.error('Error:',response);
            }
        });
    })
}