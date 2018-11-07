    <!-- /.modal -->
 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Informacion de {{$user->name}} {{$user->lasName}} - {{$user->getType()}}</h4> </div>
                <div class="modal-body">
                      <div class="white-box">
                        <div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-6 mod-photo">
                                  <img width="200" height="200" @if($user->userSpecification->urlImg!=null) src="{{ asset('imgUsuarios/'.$user->userSpecification->urlImg) }}" @else src="{{ asset('imgUsuarios/user-default.jpg') }}" @endif alt="user" class="img-thumbnail image-user">
                              </div>

                              <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-primary">{{$user->name}}</td>
                                                <td class="text-primary">{{ $user->lastName }}</td>
                                            </tr>
                                            @if($user->userType->id!=2)
                                            <tr>
                                                <td class="text-danger">Código:</td>
                                                <td class="text-info">{{$user->code}} </td>
                                            </tr>
                                            @endif

                                            <tr>
                                              <td class="text-danger">DNI:</td>
                                              @if ($user->dni!=null)
                                                <td class="text-info">{{$user->dni}} </td>    
                                              @else
                                                <td> - </td>  
                                              @endif
                                            </tr>
                                            <tr>
                                              <td class="text-danger">Tipo:</td>
                                              <td class="text-info">{{$user->getType()}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                              </div>
                            </div>
                            <br>
                            @if(!$user->esEmpleado())
                            <div class="col-md-12 divLector">
                              <div class="row text-center m-t-30">
                                <div class="col-md-4 b-r">
                                <h2>{{$user->orders->count()}}</h2>
                                  <h4 class="text-danger">PEDIDOS</h4>
                                </div>
                                <div class="col-md-4 b-r">
                                  <h2>0</h2>
                                  <h4 class="text-danger">PRÉSTAMOS</h4>
                                </div>
                                <div class="col-md-4 ">
                                  <h2>0</h2>
                                  <h4 class="text-danger">CASTIGOS</h4>
                                </div>
                              </div>
                            </div>
                            @else
                            <div class="col-md-12 divEmployee" >
                              <div class="row text-center m-t-30">
                                <div class="col-md-6 b-r">
                                  <h2>0</h2>
                                  <h4 class="text-danger">PRÉSTAMOS</h4>
                                </div>
                                <div class="col-md-6 b-r">
                                  <h2>0</h2>
                                  <h4 class="text-danger">RECHAZOS</h4>
                                </div>
                              </div>
                            </div>
                            @endif


                              <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                          @if(!$user->esEmpleado())
                                            <tr class="divLector">
                                                <td class="text-danger">Escuela</td>
                                                @if($user->school!=null)
                                                <td class="text-info">{{$user->school->name}}</td>
                                                @else <td> - </td> @endif
                                            </tr>
                                          @endif
                                            <tr>
                                                <td class="text-danger"> Correo Institucional</td>
                                                @if ($user->instEmail!=null)
                                                  <td class="text-info">{{$user->instEmail}}</td>    
                                                @else
                                                  <td> - </td>  
                                                @endif
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-danger">Correo personal</td>
                                                @if ($user->userSpecification->personalEmail!=null)
                                                  <td class="text-info">{{$user->userSpecification->personalEmail}} </td>    
                                                @else
                                                  <td> - </td>  
                                                @endif
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-danger">Dirección</td>
                                                @if ($user->userSpecification->address!=null)
                                                  <td class="text-info">{{$user->userSpecification->address}}</td>
                                                @else
                                                  <td> - </td>  
                                                @endif
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-danger">Celular</td>
                                                @if ($user->userSpecification->cellPhone!=null)
                                                <td class="text-info">{{$user->userSpecification->cellPhone}} </td>
                                                @else
                                                  <td> - </td>  
                                                @endif
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-danger">Teléfono</td>
                                                @if ($user->userSpecification->phone!=null)
                                                  <td class="text-info">{{$user->userSpecification->phone}} </td>
                                                @else
                                                  <td> - </td>  
                                                @endif
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                              @if($user->userSpecification->description!=null)
                                <div class="col-md-12">
                                  <div class="row text-center">
                                    <div class="col-md-12">
                                      <h3 class="box-title m-t-0">Descripción</h3>
                                      <p> {{$user->userSpecification->description}}</p>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            </div>

                          </div>
                        </div>
                </div>
            </div>
        </div>

