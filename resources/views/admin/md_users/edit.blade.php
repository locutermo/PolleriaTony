
    <!-- sample modal content -->
    <!-- /.modal -->
    <div id="edit-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" >
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Editar usuario</h4> </div>
                <div class="modal-body block5">
                  @if($user ==null)
                		<p>Sin Seleccionar</p>
                	@else
                   <form data-toggle="validator" id="formEditUser" action="#" enctype="multipart/form-data">
                    <section class="m-t-40">
                    <div class="sttabs sttabs-user-edit  tabs-style-iconbox">
                        <nav>
                            <ul>
                                <li><a href="#section-iconbox-1" class="sticon ti-user"><span>Usuario</span></a></li>
                                <li><a href="#section-iconbox-2" class="sticon ti-agenda"><span>Informacion</span></a></li>
                            </ul>
                        </nav>

                        <div class="content-wrap">
                            <section id="section-iconbox-1">
                              <hr>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-4">
                                        <label for="editNameUser" class="control-label">Nombres (*)</label>
                                        <input type="text" name="name" class="form-control" data-toggle="validator" value="{{$user->name}}" id="editNameUser" placeholder="Nombre" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="editLastNameUser" class="control-label">Apellidos (*)</label>
                                        <input type="text" name="lastname" class="form-control" data-toggle="validator" value="{{$user->lastName}}" id="editLastNameUser" placeholder="Apellido" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="editTypeUser" class="control-label">Tipo de Lector (*)</label>
                                          <select name="type" data-toggle="validator" id="editTypeUser" disabled	class="select2 form-control" required>
                                            <option value="{{$user->userType->id}}" selected>{{$user->userType->name}}</option>

                                          </select>
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-5">
                                        <label for="editDniUser" class="control-label">DNI</label>
                                        <input type="text" name="dni" data-mask="99999999" value="{{$user->dni}}" class="form-control validate-this" id="editDniUser">
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-7">
                                        <label for="editInsEmailUser" class="control-label">Correo Inst. (*)</label>
                                        <input type="email" data-toggle="validator"  data-toggle="validator" name="instEmail" value="{{$user->instEmail}}" class="form-control" id="editInsEmailUser" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                <div class="row">
                                  <div class="form-group col-sm-12">
                                    <label for="urlImgEdit" class="control-label">Foto</label>
                                    <input type="file" name="urlImgEdit" data-height="200" data-default-file="{{ asset('imgUsuarios/'.$user->userSpecification->urlImg) }}" id="urlImgEdit" class="dropify" data-allowed-file-extensions="png jpg"/></div>
                                  </div>
                              </div>

                            </section>
                            <section>
                              <hr>
                              @if(!$user->esEmpleado())
                              <div class="form-group" id="form-group-lector-edit">
                                  <div class="row">
                                      <div class="form-group col-sm-6">
                                        <label for="editCodeUser" class="control-label">Código de lector (*)</label>
                                        <input type="text" name="code" data-toggle="validator" class="form-control" value="{{$user->code}}" id="editCodeUser" placeholder="XXXXX" >
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-6">
                                        <label for="editSchoolUser" class="control-label">Escuela </label>
                                          <select name="school"  id="editSchoolUser"	class="select2 form-control" >
                                              @if($user->school!=null || $user->school_id !=0)
                                                @foreach($schools as $school)
                                                  <option @if($school->id == $user->school->id) selected @endif value="{{$school->id}}">{{$school->name}}</option>
                                                @endforeach
                                                <option value="0">No Seleccionado</option> 

                                              @else 
                                              <option value="0" selected>No Seleccionado</option> 
                                              @foreach($schools as $school)
                                                  <option value="{{$school->id}}">{{$school->name}}</option>
                                                @endforeach
                                              @endif
                                          </select>
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                              @endif
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-6">
                                        <label for="editPhoneUser" class="control-label">Teléfono</label>
                                        <input type="text" name="phone" data-mask="999-9999" class="form-control" value="{{$user->userSpecification->phone}}" id="editPhoneUser" >
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-6">
                                        <label for="editCellPhoneUser" class="control-label">Celular </label>
                                        <input type="text" name="cellPhone" data-mask="999999999" value="{{$user->userSpecification->cellPhone}}" class="form-control" id="editCellPhoneUser" >
                                        <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-6">
                                        <label for="editPersonalEmailUser" class="control-label">Correo Personal</label>
                                        <input type="email" name="personalEmail" class="form-control" value="{{$user->userSpecification->personalEmail}}" id="editPersonalEmailUser" >
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-6">
                                        <label for="editAddressUser" class="control-label">Dirección</label>
                                        <input type="text" name="address" class="form-control" value="{{$user->userSpecification->address}}" id="editAddressUser" >
                                        <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="form-group col-sm-12">
                                    <label for="editDescriptionUser" class="control-label">Descripción</label>
                                    <textarea name="description" class="form-control" id="editDescriptionUser" placeholder="Ingrese alguna descripción del usuario">{{$user->userSpecification->description}}</textarea>
                                    <div class="help-block with-errors"></div>
                                  </div>
                                </div>
                              </div>
                            </section>

                        </div>
                    </div>
                  </section>
                    <div class="footer-boton">
                      <button id="btnEditarUsuario" data-id="{{$user->id}}" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-envelope-o m-r-5"></i> <span>Guardar</span><span id="percentageEdit"> 0%</span></button>
                    </div>
                  </form>
                @endif
                </div>
            </div>
        </div>
    </div>



      <script type="text/javascript">
          (function () {
                  [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
                    new CBPFWTabs(el);
                  });

                  initDropify();
                  instansFunctionsUserEdit();
          })();
      </script>


     
