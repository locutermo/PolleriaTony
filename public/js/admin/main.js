$(document).ready(function(){

    instansDT('.datatable');
});


function instansDT(e){
    $(e).DataTable();
    console.log("init datatables");
}