<div class="box">
	<div class="box-header">
	  <h3 class="box-title text-muted">Mantenimiento de empleados</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table class="table-export-pdf table-users table table-striped">
		<thead>
		<tr>
		  <th>Empleado</th>
		  <th>Foto</th>
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
				<td>{{$user->name}} {{$user->lastname}}</td>
				<td> .. </td>
				<td>{{$user->dni}}</td>
				<td>{{$user->getType()}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->cellphone}}</td>
				<td class="text-center">
						<button type="button"   class="btn btn-info btn-outline btn-circle btn-sm m-r-5 editUser" data-id="1" ><i class="fa fa-pencil"></i></button>
						<button type="button"   class="btn btn-danger btn-outline btn-circle btn-sm m-r-5 deleteUser" data-id="1" ><i class="fa fa-trash"></i></button>
		
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






