var urlImgP =  $('#urlImgProduct');
var isCreate = false;
var porcentaje = 0;
var btnCreateProduct = $('#btnCrearProducto');

$(document).ready(function(){
    insertButtonCreateProduct();
    instansFunctionsProductCreate();
    deleteProduct();
    showEditProduct();
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

function showInformationProduct(){
    $(document).on('click','.showProductInformation',function(event){
        $id = $(this).data('id');
        $('#show-informationP').modal({show:'true'});
        $('#show-informationP').load('products/'+$id+'/information');
        $('#show-informationP').modal({show:'false'});
    });
}

function showEditProduct(){
    $(document).on('click',".editProduct",function(event){
        isCreate = false;
        $id = $(this).data('id');
        $(".div-edit").load('products/'+$id+'/edit',function(){
            $('#edit-product-modal').modal({show:true});
        });
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

function deleteProduct(){
    $(document).on('click','.deleteProduct',function(){
        var id = $(this).data('id');
        $.ajax({
            url: 'products/'+id+'/destroyValidation',
            type: 'post',
            data: {
                _token : $('#token').val(),
            },
            success: function(data){
                var obj = JSON.parse(data);
                swal({
                    title: obj.titulo,
                    text: obj.texto,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sí, Eliminar !",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: 'products/'+id+'/destroy',
                            type: 'post',
                            data: {
                                _token : $('#token').val(),
                            },
                            success: function(data){
                                var obj = JSON.parse(data);
                                swal({
                                    title: obj.titulo,
                                    text: obj.texto,
                                    type: "success",
                                },function(){
                                    console.log("Producto Eliminado");
                                    location.reload();
                                });
                            },error:function(response){
                            console.log(response);
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

function editProduct(){
    $(document).on('click',"#btnEditarProducto  ",function(event){
        if(true){
            var formData = new FormData('#formEditProduct');
            var id = $(this).data('id');
            formData.append('id',id);
            formData.append('_token',$('#token').val());
            getDataEditP(formData);
            $.ajax({
                url: 'products/update',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(e){
                    swal({
                        title: "Operación Exitosa !!",
                        text: "El producto ha sido editado correctamente",
                        type: "success",
                    }, function(){
                        location.reload();
                    });
                }, error:function(e){
                    swal({
                        title: "Error Inesperado!!",
                        text: "Ha ocurrido un error inesperado",
                        type: "error",
                    });
                }
            });
        } else {
            swal({
                title: "Error al editar Producto",
                text: "Revisar si existen campos vacíos o nulos",
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

function getDataEditP(formData){
    formData.append('name',$('#inputEditNameProduct').val());
    formData.append('price',$('#inputEditPriceProduct').val());
    formData.append('stock',$('#inputEditStockProduct').val());
    formData.append('waitTime',$('#inputEditWaitTime').val());
    formData.append('description',$('#inputEditDescription').val());
    if($('#urlImgEditP')[0]!=null) formData.append('urlImgEditP',$('#urlImgEditP')[0].files[0]);
}