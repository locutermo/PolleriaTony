
    <!-- /.modal -->
    <div id="create-order-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="modal-order-title" class="modal-title">Agregar nuevo pedido</h4> </div>
                <div class="modal-body">
                  <form data-toggle="validator" id="formAddOrder" action="#">

                  <section class="m-t-40 section-main-order" >
                        <div class="content-wrap">
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-8">
                                        <label for="inputProductsOrder" class="control-label">Producto (*)</label>
                                        <select name="inputProductsOrder" class="form-control" id="inputProductsOrder" data-toggle="validator" placeholder="Producto" required>
                                                <option  value="0">No seleccionado</option>
                                                @foreach ($products as $product)
                                                <option  value="{{$product->id}}">
                                                    <span @if($product->stock<=5) class="stock_danger" @endif >
                                                        {{$product->name}} -  S/.{{$product->price}},00
                                                    </span>
                                                </option>
                                                @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="inputCountProduct" class="control-label ">Cantidad</label>
                                            <input type="number" name="count"   class="form-control " id="inputCountProduct" value="1" min="1" max="10">
                                        </div>
                                      
                                      <div class="form-group col-sm-2">
                                            <label for="inputCountProductOrder" class="control-label ">Disponible</label>
                                            <input type="number" name="count"   class="form-control"  id="inputCountProductOrder"  disabled>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                  </div>
                              </div>
                              <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-8">
                                          <label for="inputDescriptionProduct">Descripción</label>
                                          {{-- <input type="text" name="inputDescriptionProduct" id="inputDescriptionProduct" class="form-control" disabled> --}}
                                          <textarea name="inputDescriptionProduct" id="inputDescriptionProduct" cols="50" rows="3" disabled></textarea>
                                        </div>
                                        <div class="form-group col-sm-4">
                                          <button type="button" id="addProductToOrder" class="btn btn-info" class="form-control">Agregar producto</button>
                                        </div>
                                    </div>
                                </div>
                              <hr>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="form-group col-sm-8">
                                        <label for="inputObservationProductOrder">Observaciones del pedido</label>
                                        <input type="text" name="inputObservationProductOrder" id="inputObservationProductOrder" class="form-control">
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="inputTableOrder">Mesa (*)</label>
                                        <select name="inputTable" id="inputTableOrder" class="form-control ">
                                        <option value="0">Sin asignar</option>    
                                        @foreach ($tables as $table)
                                            <option value="{{$table->id}}">{{$table->number}}</option>
                                        @endforeach
                                        </select>  
                                      </div>
                                  </div>
                              </div>

                              <hr>
                              <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label>Lista de pedido</label>
                                            <div class="box-body no-padding">
                                                <table class="table table-striped" id="table-order">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Producto</th>
                                                            <th>Unidades</th>
                                                            <th style="width: 40px">Precio </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th> </th>
                                                            <th> </th>
                                                            <th> </th>
                                                            <th id="totalPrice">S/.00,00</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /content -->
                </section>
                <div class="footer-boton text-center">
                  
                  <button id="btnCrearPedido" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-cart-arrow-down m-r-5"></i> <span id="btnCreateOrderTitle" >Generar pedido</span></button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-group{
            margin-bottom: 5px;
        }

        #inputProductsOrder .form-control{
            color: red;
        }
    </style>