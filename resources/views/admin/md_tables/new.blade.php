<div class="box box-info box-solid">
    <div class="box-header ">
        <h4 class="box-title">Registrar mesa </h4>
    </div>
    <div class="box-body">
            <form data-toggle="validator" action="#">
                  <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="inputNumberTable" class="control-label">Número</label>
                        <input type="number" name="name" class="form-control" id="inputNumberTable" placeholder="Número de mesa" min="1" required>
                        <div class="help-block with-errors"></div>

                      </div>
                      <div class="form-group col-sm-6">
                        <label for="inputCapacityTable" class="control-label">Capacidad <i class="ti ti-help-alt" title="Este campo hace referencia a la cantidad de sillas que tiene la mesa" data-toggle="tooltip"></i></label>
                        <input name="level" type="number" placeholder="Cantidad de sillas" min="1" max="20" class="form-control" id="inputCapacityTable" required>
                        <div class="help-block with-errors"></div>
                      </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="inputStateOfTable" class="control-label">Estado</label>
                          <select name="state" data-toggle="validator" id="inputStateOfTable"	class="select2 form-control" required>
                              <option value="1">Disponible</option>
                              <option value="2">Ocupado</option>
                          </select>
                      </div>
                </div>

                <div class="footer-boton text-center">
                    <button id="btnCrearMesa" type="button" class="btn btn-info"> <i class="fa fa-save"></i> <span>Crear</span></button>
                </div>
	          </form>
    </div>
</div>
