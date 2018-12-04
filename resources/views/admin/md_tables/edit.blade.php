<div class="box box-success box-solid">
        <div class="box-header ">
            <h4 class="box-title">Modificar mesa </h4>
        </div>
        <div class="box-body">
        	@if($table ==null)
        		<p align="center">Sin Seleccionar</p>
        	@else
            <!--  -->
            <form data-toggle="validator" action="#">
                  <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="editNumberTable" class="control-label">Número</label>
                        <input type="text" name="name" class="form-control" id="editNumberTable" value="{{ $table->number }}" placeholder="Número de mesa" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="editCapacityTable" class="control-label">Capacidad</label>
                        <input name="level" type="number" min="1" max="20" class="form-control" id="editCapacityTable" value="{{ $table->capacity }}" placeholder="Total de sillas " required>
                        <div class="help-block with-errors"></div>
                      </div>
                 </div>
              
                  <div class="row">
                      <div class="form-group col-sm-12">
                        <label for="editStateTable" class="control-label">Estado</label>
                          <select name="state" data-toggle="validator" id="editStateTable"	class="selectEdit form-control" required>
                            <option value="1" @if($table->state==1) selected @endif> Disponible </option>
                            <option value="2" @if($table->state==2) selected @endif> Ocupado </option>
                          </select>
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
              <div class="footer-boton text-center">
                    <button id="btnEditTable" data-id="{{$table->id}}" type="button" class="btn btn-info"> <i class="fa fa-save"></i> <span>Guardar</span></button>
                </div>
            </form>
        	@endif
		</div>
</div>
<!-- Este script solo carga cuando se indica en editar por eso debe ir aca -->
<script>
  $(document).ready(function() {
      $('.selectEdit').select2();
      updateTable();
  });
</script>

