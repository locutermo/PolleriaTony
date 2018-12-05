@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pedidos pendientes
            {{-- <small>Control panel</small> --}}
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Pedidos pendientes</a></li>
            
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
 
        <input type="hidden" id="token" value="{{csrf_token()}}">
              <div class="row">
                  <div class="col-md-4 div-information-order">
                      {!! $info !!}
                  </div>
                  <div class="col-md-8">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Pedidos pendientes</h3>
          
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="table-responsive">
                          <table class="table no-margin">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Pedido</th>
                              <th>Monto total </th>
                              <th>Cantidad</th>
                              <th>Observación</th>
                              <th>Estado</th>
                              <th>Acción</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($orders as  $i =>$order)
                               @if ($order->state!=3)
                               <tr>
                                  <td>{{$i+1}}</td>
                                  <td><a href="#" data-id="{{$order->id}}">{{$order->table->number}}MP{{$order->id}}</a></td>
                                  <td>
                                    S/.{{$order->totalPrice}},00
                                  </td>
                                  <td class="text-left">
                                      {{$order->products->count()}} @if($order->products->count()>1) Productos @else  Producto @endif
                                  </td>
                                  <td>
                                   @if($order->observation!=null) {{$order->observation}} @else No tiene observación @endif
                                  </td>
                                  <td>
                                    @if ($order->state==1)
                                      <span class="label label-info">{{$order->getState()}}</span>
                                      @elseif($order->state==2)
                                        <span class="label label-danger">{{$order->getState()}}</span>
                                    @endif 
                                  </td>
                                  <td>
                                    {{-- <button class="btn btn-info">Aceptar</button> --}}
                                  @if ($order->state==2)
                                  <a data-id="{{$order->id}}" class="btn btn-social-icon btn-linkedin aceptarPedido"><i class="fa fa-eye"></i></a>  
                                  @endif
                                    
                                  @if($order->state==1) 
                                    <a data-id="{{$order->id}}" class="btn btn-social-icon btn-linkedin aceptarPedido"><i class="fa fa-check"></i></a>  
                                    {{-- <a data-id="{{$order->id}}" class="btn btn-social-icon btn-google rechazarPedido"><i class="fa fa-close"></i></a> --}}
                                  @endif
                                  </td>
                                </tr>   
                               @endif 
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer clearfix">
                        {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> --}}
                      </div>
                      <!-- /.box-footer -->
                    </div>
                  </div>
              </div>
        </section>
        <!-- /.content -->
      </div>
@endsection



