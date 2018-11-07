$(document).ready(function(){

    insertButtonCreate();
})

function insertButtonCreate(){
    $('.table-users').before('<button id="create_user" data-toggle="modal" class="pull-left fcbtn btn btn-outline btn-danger btn-1f" data-target="#create-user-modal" type="button" name="button" style="height: 31.31px;font-size:0.88em; padding: 0.5em 1em;"><i class="fa fa-plus"></i> Agregar Usuario</button>');
}