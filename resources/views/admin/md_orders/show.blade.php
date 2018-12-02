<div class="box">
	<div class="box-header">
	  <h3 class="box-title text-muted">Historial de Pedidos </h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table class="table-export-pdf table-orders table table-striped">
		<thead>
		<tr>
			<th>Pedido</th>
		  <th>Empleado</th>
		  <th>Fecha</th>
		  <th>Mesa</th>
		  <th>Precio total</th>
		  <th>Estado</th>
		  <th></th>
		</tr>
		</thead>
		<tbody>
		@foreach ($orders as $order)
			<tr>
				<td>
					<a class="showOrderInformation" data-id="{{$order->worker->id}}" href="#" >
						{{$order->table->number}}MP{{$order->id}}
					</a>
				</td>
				<td>
					<a class="showUserInformation" data-id="{{$order->worker->id}}" href="#" >
						{{$order->worker->name}} {{$order->worker->lastname}}
					<a>
				</td>
				<td>{{$order->date}}</td>
				<td>{{$order->table->number}}</td>
				{{-- Por ahora lo pondré solo entero y por eso le adiciono el ,00 --}}
				<td>S/{{$order->totalPrice}},00</td> 
				<td>{{$order->getState()}}</td>
				<td class="text-center">
				@if ($order->state==1)
					<button type="button" data-toggle="modal" data-target="#create-order-modal"   class="btn btn-info btn-outline btn-circle btn-sm m-r-5 editorder" data-id="{{$order->id}}" ><i class="fa fa-pencil"></i></button>
				@elseif($order->state==3)
					<button type="button"   class="btn btn-danger btn-outline btn-circle btn-sm m-r-5 deleteorder" data-id="{{$order->id}}" ><i class="fa fa-trash"></i></button>
				@else
					<span class="label-info label "> Sin acción </span>
				@endif
						
		
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






