<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title text-muted">Productos Existentes </h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table class="table-export-pdf table-products table table-striped">
		<thead>
		<tr>
		    <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Stock</th>
            <th class="text-center">Descripcion</th>
            <th class="text-center">Imagen</th>
            <th class="text-center">T. Espera (minutos)</th>
            <th class="text-center">Accion</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($products as $product)
			<tr>
				<td class="text-center">{{$product->id}}</td>
				<td class="text-center">{{$product->name}}</td>
				<td class="text-center">{{$product->price}}</td>
				<td class="text-center">{{$product->stock}}</td>
				<td class="text-center">{{$product->description}}</td>
                @if (is_null($product->image))
                <td class="text-center">---</td>
                @else
                <td class="text-center"><img src="{{ asset('imgProductos/'.$product->image) }}" alt="{{$product->name}}" style="width:33%;height:auto;"></td>
                @endif
                <td class="text-center">{{$product->waitTime}}</td>
				<td class="text-center">
					<button type="button" data-toggle="modal" data-target="#create-product-modal"   class="btn btn-info btn-outline btn-circle btn-sm m-r-5 editProduct" data-id="{{$product->id}}" ><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5 deleteProduct" data-id="{{$product->id}}" ><i class="fa fa-trash"></i></button>
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






