var PERCENTAGE_USER = true;
var isCreate = false ; 
var urlImg =  $('#urlImg');

var porcentaje = 0;


var textForPercentage = $('#percentage');
var buttonCreate = $("#btnCrearUsuario");

$(document).ready(function(){

    insertButtonCreate();
    showInformation();
    instansFunctionsUserCreate();
    showEditUser();
    deleteUser();
})

function deleteUser(){
  $(document).on('click','.deleteUser',function(event){
    $id = $(this).data('id');
    if ($id == 1) {
      swal({
          title: "Operación no Procede !!",
          text: "Por regla general, no puede eliminar al Jefe de Área",
          type: "error",
      });
    }else{
        $.ajax({
           url: 'users/'+$id+'/destroyValidation',
           type:'post',
           data:{_token : $('#token').val(),
           },
           success: function(data)
           {
              var obj =  JSON.parse(data);
              if(obj.caso == '1' || obj.caso == "2" || obj.caso == "3" || obj.caso == "4"){
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
                           url: 'users/'+$id+'/destroy',
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
                                  console.log("deleted user");
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
      }
  });
}

function insertButtonCreate(){
    $('.table-users').before('<button id="create_user" data-toggle="modal" class="pull-left fcbtn btn btn-outline btn-danger btn-1f" data-target="#create-user-modal" type="button" name="button" style="height: 31.31px;font-size:0.88em; padding: 0.5em 1em;"><i class="fa fa-plus"></i> Agregar Usuario</button>');
}

function showEditUser(){
  $(document).on('click',".editUser",function(event) {
    isCreate=false;
    $id = $(this).data('id');
    if($id == 1){
      swal({
          title: "Operación no Procede !!",
          text: "Por regla general , no se puede editar al Jefe de Área",
          type: "error",
      });
    }else{
      $(".div-edit").load('users/'+$id+'/edit',function(){
        $('#edit-user-modal').modal({show:true});
      });
    }
  });
}

function editUser(){
    $(document).on('click',"#btnEditarUsuario",function(event) {
      if(true){
        var formData = new FormData('#formEditUser');      
        $id = $(this).data('id');
        formData.append('_token',$('#token').val());
        getDataEdit(formData);
        $.ajax({
             url: 'users/update',
             type:'post',
             data: formData,
            processData: false,
            contentType: false,
            success: function(e){
              swal({
                 title: "Operación exitosa !! ",
                 text: "El usuario ha sido editado correctamente",
                 type: "success",
               },function(){
                   location.reload();
               });
            },error:function(e){
                    swal({
                      title: "Error inesperado!!",
                      text: "Ha ocurrido un error inesperado, contacte a los desarrolladores .",
                      type: "error",
                    });
            }
        });
  
      }else{
        swal({
            title: "Error al registrar el Usuario",
            text: "Revise si hay campos vacíos o repetidos",
            type: "error",
          });
      }

  });
}

function instansFunctionsUserCreate(){
    console.log('init functions create...');
    showCreateUser();    
    createUser();

  }

function showCreateUser(){
    $('#create_user').on('click',function(event){
        isCreate=true;
        porcentaje = 0 ;
        console.log('init show create');
    });
}

function createUser(){
    buttonCreate.on('click',function(event) {
      var formData = new FormData('#formNewUser');
      
      
        if(true){
        getData(formData);
        $.ajax({
            url: 'users/store',
            type:'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              console.log(response);
                swal({
                    title: "Operación exitosa !! ",
                    text: "El usuario ha sido registrado correctamente",
                    type: "success",
                  },function(){
                      console.log("registered user...");
                      location.reload();
                  });
            },
            
        });

        }else{
        swal({
            title: "Error al registrar el Usuario",
            text: "Revise si hay campos vacíos o repetidos",
            type: "error",
          });
      }
  
  
    });
  
  }

  /**
   * Estos datos serán los que se envíen al controlador mediante un formData 
   * debido a que las imagenes no se pueden serializar
   *
   * @param {*} formData
   */
  function getData(formData){
        formData.append('_token',$('#token').val());
        formData.append('code',$('#inputCodeUser').val());
        formData.append('name',$('#inputNameUser').val());
        formData.append('lastName',$('#inputLastNameUser').val());
        formData.append('date',$('#inputDateOfBirthUser').val());
        formData.append('type',$('#inputOfficeUser').val());
        formData.append('email',$('#inputPersonalEmailUser').val());
        formData.append('phone',$('#inputCellPhoneUser').val());
        formData.append('dni',$('#inputDniUser').val());
        if(urlImg[0]!=null) formData.append('urlImg',urlImg[0].files[0]);

  }


  function getDataEdit(formData){
    formData.append('id',$id);
    formData.append('code',$('#inputEditCodeUser').val());
    formData.append('name',$('#inputEditNameUser').val());
    formData.append('lastName',$('#inputEditLastNameUser').val());
    formData.append('date',$('#inputEditDateOfBirthUser').val());
    formData.append('type',$('#inputEditOfficeUser').val());
    formData.append('email',$('#inputEditPersonalEmailUser').val());
    formData.append('phone',$('#inputEditCellPhoneUser').val());
    formData.append('dni',$('#inputEditDniUser').val());
    if($('#urlImgEdit')[0]!=null) formData.append('urlImg',$('#urlImgEdit')[0].files[0]);

}


  function showInformation(){
    $(document).on('click','.showUserInformation',function(event){
      
      $id = $(this).data('id');
        $('#show-information').modal({show:'true'});
        $('#show-information').load('users/'+$id+'/information');
        $('#show-information').modal({show:'false'});
   
      });
  
  }