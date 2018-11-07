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
    //initKeyupValidate();
})

function insertButtonCreate(){
    $('.table-users').before('<button id="create_user" data-toggle="modal" class="pull-left fcbtn btn btn-outline btn-danger btn-1f" data-target="#create-user-modal" type="button" name="button" style="height: 31.31px;font-size:0.88em; padding: 0.5em 1em;"><i class="fa fa-plus"></i> Agregar Usuario</button>');
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
        //calculatePercentage($('.section-main-user'));
        console.log('init show create');
    });
}

function createUser(){
    buttonCreate.on('click',function(event) {
      var formData = new FormData('#formNewUser');
      //porcentaje==100 && PERCENTAGE_USER
      //Por el momento no habrá validación para registrar, solo se está probando la funcionalidad
        if(true){
        getData(formData);
        $.ajax({
            url: 'users/store',
            type:'post',
            data: formData,
           processData: false,
           contentType: false,
            success: function (response) {
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

  function getData(formData){
    formData.append('_token',$('#token').val());
        formData.append('name',$('#inputNameUser').val());
        formData.append('lastName',$('#inputLastNameUser').val());
        formData.append('date',$('#inputDateOfBirthUser').val());
        formData.append('office',$('#inputOfficeUser').val());
        formData.append('email',$('#inputPersonalEmailUser').val());
        formData.append('cellphone',$('#inputCellPhoneUser').val());
        formData.append('dni',$('#inputDniUser').val());
        if(urlImg[0]!=null) formData.append('urlImg',urlImg[0].files[0]);

  }

  function initKeyupValidate(){
    $('.input[data-toogle="validator"]').on('keyup',function(event){
      calculatePercentage($('.section-main-user'));
      console.log(porcentaje);
    })
  }

  function calculatePercentage(classSttabsUser){
    if(PERCENTAGE_USER){
      var errores = 0 ;
      var inputs = classSttabsUser.find(' input[data-toggle="validator"]').size();
      var select = classSttabsUser.find(' select[data-toggle="validator"]').size();
      var textarea = classSttabsUser.find(' textarea[data-toggle="validator"]').size();
      var total =  inputs+select+textarea;
      classSttabsUser.find(' input[data-toggle="validator"]').each(function(){
        if($(this).val()=='' || $(this).parent().hasClass('has-error')){
          errores++;
        }
      });
    
      classSttabsUser.find(' select[data-toggle="validator"]').each(function(){
        if($(this).hasClass('select2-multiple')){
          if($(this).val() == null){
            errores++;
          }
        }else{
          if($(this).find('option:selected').val() == -1 || $(this).parent().hasClass('has-error')){
            errores++;
          }
        }
      });
      classSttabsUser.find(' textarea[data-toggle="validator"]').each(function(){
        if($(this).val()=='' || $(this).parent().hasClass('has-error')){
          errores++;
        }
      });
      var actual = total - errores ;
      porcentaje = actual*100/total;
      console.log('entró en el calculo de porcentaje: ',porcentaje, actual , total ,errores,isCreate);
      if(isCreate) $('#percentage').html('( '+porcentaje.toFixed(2)+'% )');
      else $('#percentageEdit').html('( '+porcentaje.toFixed(2)+'% )');
            
      if(porcentaje == 100){
        if(isCreate){
          buttonCreate.removeClass("btn-primary");
          buttonCreate.removeClass("btn-danger");
          buttonCreate.addClass("btn-success");
        }else{
          $('#btnEditarUsuario').removeClass("btn-primary");
          $('#btnEditarUsuario').removeClass("btn-danger");
          $('#btnEditarUsuario').addClass("btn-success");
        }
  
      }else{     
        if(isCreate)  {
          buttonCreate.removeClass("btn-primary");
          buttonCreate.removeClass("btn-success");
          buttonCreate.addClass("btn-danger");
        }else{
          $('#btnEditarUsuario').removeClass("btn-primary");
          $('#btnEditarUsuario').removeClass("btn-success");
          $('#btnEditarUsuario').addClass("btn-danger");
        }
        
      }
      }else console.log("Calculate percent off");
  }



  function showInformation(){
    $(document).on('click','.showUserInformation',function(event){
      
      $id = $(this).data('id');
        $('#show-information').modal({show:'true'});
        $('#show-information').load('users/'+$id+'/information');
        $('#show-information').modal({show:'false'});
   
      });
  
  }