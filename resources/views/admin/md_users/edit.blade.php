
    <!-- /.modal -->
    <div id="edit-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Modificar Usuario</h4> </div>
                <div class="modal-body">
                    @if($worker ==null)
                    <p> Sin información </p>
                    @else
                  <form data-toggle="validator" id="formEditUser" action="#" enctype="multipart/form-data" files="true">
                  <section class="m-t-40 section-main-user" >
                        <div class="content-wrap">
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-6">
                                        <label for="inputEditNameUser" class="control-label">Nombres (*)</label>
                                      <input type="text" name="name"  class="form-control" id="inputEditNameUser" data-toggle="validator" placeholder="Nombre" required value="{{$worker->name}}">
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-6">
                                        <label for="inputEditEditLastNameUser" class="control-label">Apellidos (*)</label>
                                        <input type="text" name="lastname" class="form-control" id="inputEditLastNameUser" data-toggle="validator" placeholder="Apellido" required value="{{$worker->lastname}}">
                                        <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="inputEditDateOfBirthUser" class="control-label ">Fecha de Nacimiento</label>
                                        <input type="date" name="birthday"  data-mask="99999999" class="form-control validate-this" id="inputEditDateOfBirthUser" value="{{$worker->birthday}}" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputEditOfficeUser" class="control-label ">Cargo (*)</label>
                                        <select class="select form-control" name="office" data-toggle="validator"  id="inputEditOfficeUser" required>
                                            <option @if($worker->type==1) selected @endif value="1">Jefe de Área</option>
                                            <option @if($worker->type==2) selected @endif value="2">Despachador</option>
                                            <option @if($worker->type==3) selected @endif value="3">Mozo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-6">
                                        <label for="inputEditDniUser" class="control-label ">DNI</label>
                                        <input type="text" name="dni"  data-mask="99999999" class="form-control validate-this" id="inputEditDniUser" value="{{$worker->dni}}" >
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-6">
                                            <label for="inputEditCodeUser" class="control-label">Código</label>
                                            <input type="text" name="code" class="form-control" id="inputEditCodeUser" placeholder="Código de entrada" value="{{$worker->user->username}}">
                                            <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                        
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                          <label for="inputEditPersonalEmailUser" class="control-label">Correo Personal</label>
                                          <input type="email" name="personalEmail" class="form-control" id="inputEditPersonalEmailUser" placeholder="Ingrese su email personal" value="{{$worker->email}}">
                                          <div class="help-block with-errors"></div>
                                        </div>
                                        {{-- <div class="form-group col-sm-6">
                                          <label for="inputEditAddressUser" class="control-label">Dirección</label>
                                          <input type="text" name="address" class="form-control" id="inputEditAddressUser" placeholder="XXXXX" >
                                          <div class="help-block with-errors"></div>
                                        </div> --}}
                                        <div class="form-group col-sm-6">
                                            <label for="inputEditCellPhoneUser" class="control-label">Celular</label>
                                            <input type="text" name="phone" data-mask="999-9999" class="form-control" id="inputEditCellPhoneUser" value="{{$worker->phone}}" >
                                            <div class="help-block with-errors"></div>
                                      </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <div class="row">
                                          <div class="form-group col-sm-12">
                                            <label for="urlImg" class="control-label">Foto</label>
                                          <input type="file" name="urlImgEdit" data-height="200" data-default-file="{{ asset('imgUsuarios/'.$worker->photo) }}" value="{{$worker->photo}}" id="urlImgEdit" class="dropify" data-allowed-file-extensions="png jpg"/></div>
                                          </div>
                                </div>

                        </div>

                        <!-- /content -->
                </section>
                <div class="footer-boton text-center">
                <button data-id="{{$worker->id}}" id="btnEditarUsuario" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-envelope-o m-r-5"></i> <span >Editar</span></button>
                  {{-- <button id="btnCrearUsuario" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-envelope-o m-r-5"></i> <span >Crear</span> <span id="percentage"> 0% </span></button> --}}
                </div>
                </form>
                @endif
                </div>
            </div>
        </div>
    </div>



      <script type="text/javascript">
          (function () {
                  initDropify();
                  editUser();
          })();
      </script>


     
