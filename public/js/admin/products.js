var urlImgP =  $('#urlImgProduct');
var isCreate = false;
var porcentaje = 0;
var btnCreateProduct = $('#btnCrearProducto');

$(document).ready(function(){
    insertButtonCreateProduct();
    instansFunctionsProductCreate();
})

function insertButtonCreateProduct(){
    $('.table-products').before('<button id="create_product" data-toggle="modal" class="pull-left fcbtn btn btn-outline btn-info btn-1f" data-target="#create-user-modal" type="button" name="button" style="height: 31.31px;font-size:0.88em; padding: 0.5em 1em;"><i class="fa fa-plus"></i> Agregar Producto </button>');
}

function instansFunctionsProductCreate(){
    console.log('init functions create...');
    showCreateProduct();    
    createProduct();
  }

function showCreateProduct(){
    $('#create_product').on('click',function(event){
        isCreate=true;
        porcentaje = 0 ;
        console.log('init show create');
    });
}


function createProduct(){
    btnCreateProduct.on('click',function(event){
        var formDataP = new FormData('#formNewProduct');
        if(true){
            getDataP(formDataP);
            $.ajax({
                url: 'products/store',
                type: 'post',
                data: formDataP,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    swal({
                        title: "Operación Exitosa !!",
                        text: "El producto se registró correctamente",
                        type: "success",
                    },function(){
                        console.log("Producto ya registrado.");
                        location.reload();
                    });
                },error: function(response){
                    console.log(response);
                }
            });
        } else {
            swal({
                title: "Error al registrar el producto",
                text: "Revise si hay campos vacíos o repetidos",
                type: "error",
            });
        }
    
    });
}

function getDataP(formDataP){
    formDataP.append('_token',$('#token').val());
    formDataP.append('name',$('#inputNameProduct').val());
    formDataP.append('price',$('#inputPriceProduct').val());
    formDataP.append('stock',$('#inputStockProduct').val());
    formDataP.append('waitTime',$('#inputWaitTime').val());
    formDataP.append('description',$('#inputDescription').val());
    if(urlImgP[0]!=null) formDataP.append('urlImgProduct',urlImgP[0].files[0]);
}

function deleteProduct(){
    $(document).on('click','.deleteProduct',function(){
        var id = $(this).data('id');
        $.ajax({
            url: 'products/'+id+'/destroyValidation',
            type: 'post',
            data: {
                _token : $('#token').val(),
                id : id
            },
            success: function(data){
                var obj = JSON.parse(data);
                swal({
                    title: obj.titulo,
                    text: obj.texto,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    configurmButtonText: "Sí, Elmininar !",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                    closeOnConfirm: false
                }, function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: 'products/'+id+'/destroy',
                            type: 'post',
                            data: {
                                _token : $('#token').val(),
                                id : id,
                            },
                            success: function(data){
                                var obj = JSON.parse(data);
                                swal({
                                    title: obj.titulo,
                                    text: obj.texto,
                                    type: "success",
                                },function(){
                                    console.log("Eliminado");
                                    location.reload();
                                });
                            }
                        })
                    } else {
                        swal("Cancelado", "La operacion fue cancelada", "error")
                    }
                }) 
            }
        });
    })
}