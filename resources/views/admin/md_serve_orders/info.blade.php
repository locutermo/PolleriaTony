
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Productos del pedido actual</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if ($order!=null)
            <ul class="products-list product-list-in-box">
                    @foreach ($order->products as $product)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{ asset('imgProductos/'.$product->image) }}" alt="Product Image">
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{$product->name}} - {{$product->pivot->quantify}} @if($product->pivot->quantify>1) unidades @else unidad @endif  
                                <span class="label label-warning pull-right">S/.{{$product->price}},00 c/u</span></a>
                            <span class="product-description">
                                {{$product->description}}
                                </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @else
                <span class="text-muted ">Seleccione un pedido</span>
            @endif
          </div>
          <!-- /.box-body -->
         @if ($order!=null)
            <div class="box-footer text-center">
            
            <button class="btn btn-danger btnFinalizarPedido" data-id="{{$order->id}}" >Finalizar</button>
            </div>
         @endif
          <!-- /.box-footer -->
        </div>
        
        <script>
            $(document).ready(function(){
                endOrder();
            })
        </script>
        