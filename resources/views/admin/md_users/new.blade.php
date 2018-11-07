
    <!-- /.modal -->
    <div id="create-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Registrar Usuario</h4> </div>
                <div class="modal-body">
                  <form data-toggle="validator" id="formNewUser" action="#" enctype="multipart/form-data" files="true">

                  <section class="m-t-40">
                        <div class="content-wrap">
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-4">
                                        <label for="inputNameUser" class="control-label">Nombres (*)</label>
                                        <input type="text" name="name" class="form-control" id="inputNameUser" data-toggle="validator" placeholder="Nombre" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="inputLastNameUser" class="control-label">Apellidos (*)</label>
                                        <input type="text" name="lastname" class="form-control" id="inputLastNameUser" data-toggle="validator" placeholder="Apellido" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-4">
                                            <label for="inputDniUser" class="control-label ">Fecha de Nacimiento</label>
                                            <input type="date" name="dni"  data-mask="99999999" class="form-control validate-this" id="inputDniUser"  >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="form-group col-sm-4">
                                            <label for="inputDniUser" class="control-label ">Cargo</label>
                                            <select class="select form-control" name="office" id="inputOfficeUser" required>
                                                <option value="1">Administrador</option>
                                                <option value="2">Despachador</option>
                                                <option value="3">Mozo</option>
                                            </select>
                                    </div>
                                      <div class="form-group col-sm-4">
                                        <label for="inputDniUser" class="control-label ">DNI</label>
                                        <input type="text" name="dni"  data-mask="99999999" class="form-control validate-this" id="inputDniUser"  >
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-4">
                                            <label for="inputPhoneUser" class="control-label">Celular</label>
                                            <input type="text" name="phone" data-mask="999-9999" class="form-control" id="inputPhoneUser" >
                                            <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                        
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                          <label for="inputPersonalEmailUser" class="control-label">Correo Personal</label>
                                          <input type="email" name="personalEmail" class="form-control" id="inputPersonalEmailUser" placeholder="Ingrese su email personal" >
                                          <div class="help-block with-errors"></div>
                                        </div>
                                        {{-- <div class="form-group col-sm-6">
                                          <label for="inputAddressUser" class="control-label">Dirección</label>
                                          <input type="text" name="address" class="form-control" id="inputAddressUser" placeholder="XXXXX" >
                                          <div class="help-block with-errors"></div>
                                        </div> --}}
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                        <div class="row">
                                          <div class="form-group col-sm-12">
                                            <label for="urlImg" class="control-label">Foto</label>
                                            <input type="file" name="urlImg" data-height="200" data-default-file="" id="urlImg" class="dropify" data-allowed-file-extensions="png jpg" /> </div>
                                          </div>
                                </div> --}}

                        </div>

                        <!-- /content -->
                </section>
                <div class="footer-boton text-center">
                  <button id="btnCrearUsuario" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-envelope-o m-r-5"></i> <span >Crear</span> <span id="percentage"> 0% </span></button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

  