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
                  <div class="col-md-4">
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
                        <ul class="products-list product-list-in-box">
                          <li class="item">
                            <div class="product-img">
                              <img src="{{ asset('img/avatar.png') }}" alt="Product Image">
                            </div>
                            <div class="product-info">
                              <a href="javascript:void(0)" class="product-title">Samsung TV
                                <span class="label label-warning pull-right">$1800</span></a>
                              <span class="product-description">
                                    Samsung 32" 1080p 60Hz LED Smart HDTV.
                                  </span>
                            </div>
                          </li>
                          <!-- /.item -->
                          <li class="item">
                            <div class="product-img">
                              <img src="{{ asset('img/avatar.png') }}" alt="Product Image">
                            </div>
                            <div class="product-info">
                              <a href="javascript:void(0)" class="product-title">Bicycle
                                <span class="label label-info pull-right">$700</span></a>
                              <span class="product-description">
                                    26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                  </span>
                            </div>
                          </li>
                          <!-- /.item -->
                          <li class="item">
                            <div class="product-img">
                              <img src="{{ asset('img/avatar.png') }}" alt="Product Image">
                            </div>
                            <div class="product-info">
                              <a href="javascript:void(0)" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                              <span class="product-description">
                                    Xbox One Console Bundle with Halo Master Chief Collection.
                                  </span>
                            </div>
                          </li>
                          <!-- /.item -->
                          <li class="item">
                            <div class="product-img">
                              <img src="{{ asset('img/avatar.png') }}" alt="Product Image">
                            </div>
                            <div class="product-info">
                              <a href="javascript:void(0)" class="product-title">PlayStation 4
                                <span class="label label-success pull-right">$399</span></a>
                              <span class="product-description">
                                    PlayStation 4 500GB Console (PS4)
                                  </span>
                            </div>
                          </li>
                          <!-- /.item -->
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                      </div>
                      <!-- /.box-footer -->
                    </div>
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
                              <th>Order ID</th>
                              <th>Item</th>
                              <th>Status</th>
                              <th>Popularity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td><a href="pages/examples/invoice.html">OR9842</a></td>
                              <td>Call of Duty IV</td>
                              <td><span class="label label-success">Shipped</span></td>
                              <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                              </td>
                            </tr>
                            <tr>
                              <td><a href="pages/examples/invoice.html">OR1848</a></td>
                              <td>Samsung Smart TV</td>
                              <td><span class="label label-warning">Pending</span></td>
                              <td>
                                <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                              </td>
                            </tr>
                            <tr>
                              <td><a href="pages/examples/invoice.html">OR7429</a></td>
                              <td>iPhone 6 Plus</td>
                              <td><span class="label label-danger">Delivered</span></td>
                              <td>
                                <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                              </td>
                            </tr>
                            <tr>
                              <td><a href="pages/examples/invoice.html">OR7429</a></td>
                              <td>Samsung Smart TV</td>
                              <td><span class="label label-info">Processing</span></td>
                              <td>
                                <div class="sparkbar" data-color="#00c0ef" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                              </td>
                            </tr>
                            <tr>
                              <td><a href="pages/examples/invoice.html">OR1848</a></td>
                              <td>Samsung Smart TV</td>
                              <td><span class="label label-warning">Pending</span></td>
                              <td>
                                <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                              </td>
                            </tr>
                            <tr>
                              <td><a href="pages/examples/invoice.html">OR7429</a></td>
                              <td>iPhone 6 Plus</td>
                              <td><span class="label label-danger">Delivered</span></td>
                              <td>
                                <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                              </td>
                            </tr>
                            <tr>
                              <td><a href="pages/examples/invoice.html">OR9842</a></td>
                              <td>Call of Duty IV</td>
                              <td><span class="label label-success">Shipped</span></td>
                              <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                              </td>
                            </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                  </div>
              </div>
        </section>
        <!-- /.content -->
      </div>
@endsection



