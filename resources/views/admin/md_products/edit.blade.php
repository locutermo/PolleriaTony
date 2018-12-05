
    <!-- /.modal -->
    <div id="edit-product-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Modificar Producto</h4> </div>
                <div class="modal-body">
                    @if($product ==null)
                    <p> Sin información </p>
                    @else
                  <form data-toggle="validator" id="formEditProduct" action="#" enctype="multipart/form-data" files="true">
                    <section class="m-t-40 section-main-user">
                            <div class="content-wrap">
                                <div class="form-group">
                                    <div class="row">
                                          <div class="form-group col-sm-6">
                                            <label for="inputEditNameProduct" class="control-label">Producto</label>
                                            <input type="text" name="inputEditNameProduct" class="form-control" id="inputEditNameProduct" placeholder="Nombre de Producto" required value="{{ $product->name }}">
                                            <div class="help-block with-errors"></div>
                                          </div>
                                          <div class="form-group col-sm-6">
                                            <label for="inputEditPriceProduct" class="control-label">Precio <i class="ti ti-help-alt" title="Este campo hace referencia al precio del Producto" data-toggle="tooltip"></i></label>
                                            <input name="price" type="number" placeholder="Precio" min="1" max="200" class="form-control" id="inputEditPriceProduct" required value="{{ $product->price }}">
                                            <div class="help-block with-errors"></div>
                                          </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="inputEditStockProduct" class="control-label">Stock</label>
                                            <input type="number" name="stock" placeholder="Stock" min="1" max="200" class="form-control" id="inputEditStockProduct" required value="{{ $product->stock }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="inputEditWaitTime" class="control-label">T. Espera (minutos)</label>
                                            <input type="number" name="waitTime" placeholder="T. de Espera" min="1" max="200" class="form-control" id="inputEditWaitTime" required value="{{ $product->waitTime }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="inputEditDescription" class="control-label">Descripcion</label>
                                            <textarea  rows="3" name="editDescription" placeholder="Descripción del Producto" class="form-control" id="inputEditDescription", required >{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="urlEditImgProduct" class="control-label">Foto</label>
                                            <input type="file" name="urlEditImgProduct" data-height="200" value="{{ $product->image }}" data-default-file="{{ asset('imgProductos/'.$product->image) }}" id="urlImgEditP" class="dropify" data-allowed-file-extensions="png jpg" /> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12" style="text-align:center;">
                                        <button id="btnEditarProducto" data-id="{{$product->id}}" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-save"></i> <span>Editar</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /content -->
                    </section>
                </form>
                @endif
                </div>
            </div>
        </div>
    </div>



      <script type="text/javascript">
          (function () {
                  initDropify();
                  editProduct();
          })();
      </script>


     
