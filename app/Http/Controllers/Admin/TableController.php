<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Table as Table;

class TableController extends Controller
{

    public function index()
      {
        $tables = Table::all();

        $new = view('admin.md_tables.new',[
          'tables' => $tables,
          'table' => null

        ]);

        $edit = view('admin.md_tables.edit',[
            'table' => null,
            'tables' => $tables,
        ]);

        $show = view('admin.md_tables.show',[
            'tables' => $tables,
            'table' => null
        ]);
        //Verificar permisos del empleado
        return view('admin.md_tables.index',[
         'new' => $new,
         'edit' => $edit,
         'show' => $show,
       ]);
      }

      public function store(Request $request)
      {
        $tables = Table::all()->where('number',$request->number);
        if($tables->isNotEmpty()){
          $table = $tables->first();
          $obj = (object) array('caso' => 1, 'titulo' => 'Número de mesa repetido !!' ,'texto' => "Ya existe una mesa con el número ".$table->number ." asignado");
          return json_encode($obj);
        }else{
          $table = Table::create([
            'number' => $request->number,
            'capacity' => $request->capacity,
            'state' => $request->state,
            
          ]);
          $obj = (object) array('caso' => 0, 'titulo' => 'Operación Exitosa !!' ,'texto' => "Se ha registrado la mesa nº ".$request['number']);
          return json_encode($obj);
        }

      }

      public function edit($id)
      {

          $table = Table::find($id);
          return  view('admin.md_tables.edit', [
             'table' => $table,
          ]);
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request)
      {

            $table = Table::find($request->id);
            $tables = Table::all()->where('number',$request->number);

            if($tables->isNotEmpty()){
              if($tables->first()->id == $request->id){
                $table->number = $request->number;
                $table->capacity = $request->capacity;
                $table->state = $request->state;

                $table->save();
                  $obj = (object) array('caso' => 0, 'titulo' => 'Operación Exitosa !!' ,'texto' => "Se ha actualizado la mesa nº ".$table->number);
                return json_encode($obj);
              }else{//si no error
                $aux = $tables->first();
                $obj = (object) array('caso' => 1, 'titulo' => 'Nombre Repetido !!' ,'texto' => "Ya existe una mesa con el número ".$table->number." asignado ");
                return json_encode($obj);
              }
            }else{
              $table->number = $request->number;
              $table->capacity = $request->capacity;
              $table->state = $request->state;
              

              $table->save();
              $obj = (object) array('caso' => 0, 'titulo' => 'Operación Exitosa !!' ,'texto' => "Se ha actualizado la mesa nº".$table->number);
              return json_encode($obj);
            }

      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {

            $table = Table::find($id);
            $orders = $table->orders;
            if($table->state==2){
                //Caso 1 donde tiene pedido pendiente
                $orders = $orders->whereIn('state',1);
                if($orders->isNotEmpty()){
                  $order = $orders->first();
                  $txt = $txt."\Pedido: ".($i+1)."\nEmpleado : ".$order->worker->name;
                  $txt = $txt."\nMesa : ".$order->table->number;
                  $txt = $txt."\nEstado : ".$order->getState();
                $obj = (object) array('caso' => 1, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general, la mesa nº ".$table->number." no puede ser eliminado porque contiene un pedido pendiente asignado: ".$txt);
                return json_encode($obj);
                }
              //Caso 2 donde tiene pedido activo
                $orders = $orders->whereIn('state',2);
                if($orders->isNotEmpty()){
                  $order = $orders->first();
                  $txt = $txt."\Pedido: ".($i+1)."\nEmpleado : ".$order->worker->name;
                  $txt = $txt."\nMesa : ".$order->table->number;
                  $txt = $txt."\nEstado : ".$order->getState();
                $obj = (object) array('caso' => 1, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general, la mesa nº ".$table->number." no puede ser eliminado porque contiene un pedido activo asignado: ".$txt);
                return json_encode($obj);
                }
            }

            //En caso no ocurra ninguno de los casos anteriores
            $obj = (object) array('caso' => '0', 'titulo' => '¿Estás Seguro(a)?' ,'texto' => 'Se eliminará el Table '.$table->name.'!. de Tipo : '.$table->type);
            $table->delete();
            return json_encode($obj);
      }

      //Funcion que valida que el table no contenga registros
      //La primera vez que el admin pulsa el boton de eliminar llama a esta por ajax
      public function destroyValidation($id)
      {
        $table = Table::find($id);
        $orders = $table->orders;
        if($table->state==2){
            //Caso 1 donde tiene pedido pendiente
            $orders = $orders->whereIn('state',1);
            if($orders->isNotEmpty()){
              $order = $orders->first();
              $txt = $txt."\Pedido: ".($i+1)."\nEmpleado : ".$order->worker->name;
              $txt = $txt."\nMesa : ".$order->table->number;
              $txt = $txt."\nEstado : ".$order->getState();
            $obj = (object) array('caso' => 1, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general, la mesa nº ".$table->number." no puede ser eliminado porque contiene un pedido pendiente asignado: ".$txt);
            return json_encode($obj);
            }
          //Caso 2 donde tiene pedido activo
            $orders = $orders->whereIn('state',2);
            if($orders->isNotEmpty()){
              $order = $orders->first();
              $txt = $txt."\Pedido: ".($i+1)."\nEmpleado : ".$order->worker->name;
              $txt = $txt."\nMesa : ".$order->table->number;
              $txt = $txt."\nEstado : ".$order->getState();
            $obj = (object) array('caso' => 1, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general, la mesa nº ".$table->number." no puede ser eliminado porque contiene un pedido activo asignado: ".$txt);
            return json_encode($obj);
            }
        }

        //En caso no ocurra ninguno de los casos anteriores
        $obj = (object) array('caso' => '0', 'titulo' => '¿Estás Seguro(a)?' ,'texto' => 'Se eliminará el Table '.$table->name.'!. de Tipo : '.$table->type);
        $table->delete();
        return json_encode($obj);
        }

      //Agregar esta funcion a una clase abstracta
      public function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}


}
