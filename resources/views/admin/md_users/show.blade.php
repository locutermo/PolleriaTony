<div class="box">
	<div class="box-header">
	  <h3 class="box-title text-muted">Mantenimiento de empleados</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table class="table-export-pdf table-users table table-striped">
		<thead>
		<tr>
			<th>Foto</th>
		  <th>Empleado</th>
		  <th>DNI</th>
		  <th>Cargo</th>
		  <th>Email</th>
		  <th>Celular</th>
		  <th></th>
		</tr>
		</thead>
		<tbody>
		@foreach ($users as $user)
			<tr>
				<td>
					<img width="40" height="40"  @if($user->worker->photo!=null) src="{{ asset('imgUsuarios/'.$user->worker->photo) }}" @else src="{{ asset('img/avatar.png') }}" @endif alt="user" class="img-circle" />
				</td>
				<td>
					<a class="showUserInformation" data-id="{{$user->worker->id}}" href="#" >
						{{$user->worker->name}} {{$user->worker->lastname}}
					<a>
				</td>
				<td>{{$user->worker->dni}}</td>
				<td>{{$user->worker->getType()}}</td>
				<td>{{$user->worker->email}}</td>
				<td>{{$user->worker->phone}}</td>
				<td class="text-center">
				<button type="button"   class="btn btn-info btn-outline btn-circle btn-sm m-r-5 editUser" data-id="{{$user->worker->id}}" ><i class="fa fa-pencil"></i></button>
						<button type="button"   class="btn btn-danger btn-outline btn-circle btn-sm m-r-5 deleteUser" data-id="{{$user->worker->id}}" ><i class="fa fa-trash"></i></button>
		
					</td>
			</tr>
		@endforeach
		</tbody>
	
	  </table>
	</div>
	<!-- /.box-body -->
  </div>
  <!-- /.box -->




  <div id="show-information" class="modal fade row" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

</div>






