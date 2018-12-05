
<div id="create-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Registrar Producto</h4> 
                </div>
                <div class="modal-body">
                    <form data-toggle="validator" id="formNewProduct" action="#" enctype="multipart/form-data" files="true">
                        <section class="m-t-40 section-main-user">
                            <div class="content-wrap">
                                <div class="form-group">
                                    <div class="row">
                                          <div class="form-group col-sm-6">
                                            <label for="inputNameProduct" class="control-label">Producto</label>
                                            <input type="text" name="name" class="form-control" id="inputNameProduct" placeholder="Nombre de Producto" required>
                                            <div class="help-block with-errors"></div>
                                          </div>
                                          <div class="form-group col-sm-6">
                                            <label for="inputPriceProduct" class="control-label">Precio <i class="ti ti-help-alt" title="Este campo hace referencia al precio del Producto" data-toggle="tooltip"></i></label>
                                            <input name="price" type="number" placeholder="Precio" min="1" max="200" class="form-control" id="inputPriceProduct" required>
                                            <div class="help-block with-errors"></div>
                                          </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="inputStockProduct" class="control-label">Stock</label>
                                            <input type="number" name="stock" placeholder="Stock" min="1" max="200" class="form-control" id="inputStockProduct" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="inputWaitTime" class="control-label">T. Espera (minutos)</label>
                                            <input type="number" name="waitTime" placeholder="T. de Espera" min="1" max="200" class="form-control" id="inputWaitTime" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="inputDescription" class="control-label">Descripcion</label>
                                            <textarea  rows="3" name="description" placeholder="Descripción del Producto" class="form-control" id="inputDescription", required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="urlImgProduct" class="control-label">Foto</label>
                                            <input type="file" name="urlImgProduct" data-height="200" data-default-file="" id="urlImgProduct" class="dropify" data-allowed-file-extensions="png jpg" /> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12" style="text-align:center;">
                                        <button id="btnCrearProducto" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-save"></i> <span>Crear</span></button>
                                        {{-- <button id="btnCrearProducto" type="button" class="fcbtn btn btn-outline btn-primary btn-1e"> <i class="fa fa-envelope-o m-r-5"></i> <span >Crear</span> <span id="percentage"> 0% </span></button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>                        
                      </form>
                </div>
            </div>
        </div>  
</div>