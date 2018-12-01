         <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Informacion de {{$worker->name}} {{$worker->lastname}}</h4> </div>
                <div class="modal-body">
                    <div class="content-wrap">
                        <div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-6 mod-photo">
                                  <img width="200" height="200" @if($worker->photo!=null) src="{{ asset('imgUsuarios/'.$worker->photo) }}" @else src="{{ asset('img/avatar.png') }}" @endif alt="worker" class="img-thumbnail image-worker">
                              </div>

                              <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            {{-- <tr>
                                                <td class="text-primary">{{$worker->name}}</td>
                                                <td class="text-primary">{{ $worker->lastname }}</td>
                                            </tr> --}}
                                            @if($worker->isEmployee())
                                            <tr>
                                                <td class="text-danger">Nombre de usuario:</td>
                                                <td class="text-info">{{$worker->user->username}} </td>
                                            </tr>
                                            @endif

                                            <tr>
                                              <td class="text-danger">DNI:</td>
                                              @if ($worker->dni!=null)
                                                <td class="text-info">{{$worker->dni}} </td>    
                                              @else
                                                <td> No especificado </td>  
                                              @endif
                                            </tr>
                                            <tr>
                                              <td class="text-danger">Cargo:</td>
                                              <td class="text-info">{{$worker->getType()}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                              </div>
                            </div>
                            <br>
                           
                            </div>

                          </div>
                        </div>
                </div>
            </div>
        </div>

