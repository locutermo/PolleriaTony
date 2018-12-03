
<div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title text-muted">LISTA DE MESAS </h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
          <div class="table-responsive" >
              <table class="table-export-pdf table-tables table-striped" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th class="text-center" class="text-center">Número</th>
                          <th class="text-center" class="text-center">Capacidad</th>
                          <th class="text-center" class="text-center">Estado</th>
                          <th class="text-center" class="text-center">Editar</th>
                          <th class="text-center" class="text-center">Eliminar</th>
                          

                      </tr>
                  </thead>
                  <tbody>
                    @foreach($tables as $table)
                      <tr>
                          <td class="text-center">Mesa {{$table->number}}</td>
                          <td class="text-center">{{$table->capacity}}</td>
                          <td class="text-center">{{$table->getState()}}</td>
                          <td class="text-center">
                                <button type="button" class="btn btn-info  editarMesa" data-id="{{$table->id}}" data-capacity="{{ $table->capacity }}" data-number="{{ $table->number }}" data-state="{{ $table->state }}"  "><i class="fa fa-edit"></i></button>
                          </td>
                          <td class="text-center">
                                <button type="button" class="btn btn-danger eliminarMesa" data-id="{{$table->id}}" data-capacity="{{ $table->capacity }}" data-number="{{ $table->number }}" data-state="{{ $table->state }}"  "><i class="fa fa-trash"></i></button>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
    </div>
</div>
