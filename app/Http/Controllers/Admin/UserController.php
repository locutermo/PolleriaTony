<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Worker as Worker;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $new = view('admin.md_users.new',[
          'user' => null
        ]);
        //
        $edit = view('admin.md_users.edit',[
            'user' => null,
            'users' => $users,
        ]);

        $show = view('admin.md_users.show',[
            'users' => $users,
            'user' => null
        ]);
        //Verificar permisos del empleado
        return view('admin.md_users.index',[
          'new' => $new,
        'edit' => $edit,
         'show' => $show,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obteniendo imagen 
        $urlImgName = ($request->file('urlImg')!=null)?time().$request->file('urlImg')->getClientOriginalName():null;

        $user = User::create([
          'username' => $request->code,
          'password' => bcrypt($request->dni)
        ]);
          
        $worker = Worker::create([
          'user_id' => $user->id,
          'name' => $request->name,
          'lastname' => $request->lastName,
          'dni' => $request->dni,
          'birthday' => $request->date,
          'phone' => $request->phone,
          'email' => $request->email,
          'type' => $request->type,
          'photo' => $urlImgName,
        ]);
           
         if($urlImgName!=null) \Storage::disk('localUser')->put($urlImgName, \File::get($request->file('urlImg')));
        


        return "1";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return  view('admin.md_users.edit', [
           'user' => $user,
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
      $user = User::find($request->id);
      //Almacenando el archivo : imagen
      $user->name = $request->name;
      

      $urlImgName = ($request->file('urlImg')!=null)?time().$request->file('urlImg')->getClientOriginalName():null;

      $user->userSpecification->urlImg = $urlImgName;


        $user->save();
        
        //Almacenando la imagen con su nombre en la carpeta local solo si el archivo existe
        if($urlImgName!=null) \Storage::disk('localUser')->put($urlImgName, \File::get($request->file('urlImg')));
        
    
        return "0";
    }


    public function information($id)
    {
      $user = User::find($id);
      return  view('admin.md_users.information', [
         'user' => $user,
      ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = User::find($id);
            $orders = $user->orders;
            $txt = "";
            //Validando que el trabajador a eliminar no sea el mismo que usa la cuenta
            if(Auth::User()->id==$id){
              $obj = (object) array('caso' => 4, 'titulo' => 'La operación no procede !!' ,'texto' => 'Por regla general , no puede eliminar su propio usuario!'."\nTipo : ".$user->userType->name);
              return json_encode($obj);
            }else 
            //Validando a usuarios Lectores
            if ($user->userType!="1" && $user->userType!="2" && $user->userType!="3" && $user->userType!="4" ) {
              //Caso 1 donde pedido pendiente
              if($orders->isNotEmpty()){
                foreach ($orders as $i => $order) {
                  if ($order->state == 0) {
                    if ($order->orderCopy->materialType == 1) { //Libro
                      $book = Book::find($order->orderCopy->id_material);
                      $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$book->title;
                      $txt = $txt."\nClasificación : ".$book->clasification;
                      $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;

                    }else if ($order->orderCopy->materialType == 2) {//thesis
                      $thesis = Thesis::find($order->orderCopy->id_material);
                      $txt = $txt."\nPedido Thesis|Informe: ".($i+1)."\nTítulo : ".$thesis->title;
                      $txt = $txt."\nClasificación : ".$thesis->clasification;
                      $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;

                    }else if ($order->orderCopy->materialType == 3) {//revista
                      $magazine = Magazine::find($order->orderCopy->id_material);
                      $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$magazine->title;
                      $txt = $txt."\nVolumen : ".$magazine->volume;
                    }

                    if($i>=2){
                      $txt = $txt."\n\n TOTAL DEMÁS PEDIDOS ".($orders->count()-$i-1);
                      break;
                    }

                    $obj = (object) array('caso' => 1, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general , el alumno ".$user->name." no puede ser eliminado porque tiene pedidos pendientes ".$txt);
                    return json_encode($obj);
                  }else //Caso 2 donde tiene prestamo pendiente
                  if ($order->state==1 && $order->loan->state == 0) {
                    if ($order->orderCopy->materialType == 0) { //Libro
                      $book = Book::find($order->orderCopy->id_material);
                      $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$book->title;
                      $txt = $txt."\nClasificación : ".$book->clasification;
                      $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;
                    }else if ($order->orderCopy->materialType == 1) {//thesis
                      $thesis = Thesis::find($order->orderCopy->id_material);
                      $txt = $txt."\nPedido Thesis|Informe: ".($i+1)."\nTítulo : ".$thesis->title;
                      $txt = $txt."\nClasificación : ".$thesis->clasification;
                      $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;

                    }else if ($order->orderCopy->materialType == 2) {//revista
                      $magazine = Magazine::find($order->orderCopy->id_material);
                      $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$magazine->title;
                      $txt = $txt."\nVolumen : ".$magazine->volume;
                    }
                    $obj = (object) array('caso' => 2, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general , el alumno ".$user->name." no puede ser eliminado porque tiene prestamo pendiente sin devolver ".$txt);
                    return json_encode($obj);
                  }

                }//endforeach

              }else //Caso 3 donde tiene bloqueo
              if ($user->state == 1) {
                $obj = (object) array('caso' => 3, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general , el alumno ".$user->name." no puede ser eliminado porque esta bloqueado, tiene que devolver el material prestado ");
                return json_encode($obj);
              }
            }

            //En caso no ocurra ninguno de los casos anteriores
            $obj = (object) array('caso' => 0, 'titulo' => '¿Estás Seguro?' ,'texto' => 'Se eliminará el usuario '.$user->name.'!.'."\nTipo : ".$user->userType->name);
            $user->delete();
            return json_encode($obj);
      }

      //Validaciones -> incluir una clase abstracta con todas las validaciones
   public function codeValidation(Request $request){
       $users = User::all()->where('code',$request->value);
       if($users->isNotEmpty()){
         $obj = (object) array('valida' => 1, 'html'=>'<ul class="list-unstyled"><li>Ya existe el código: '.$request->value .' </li></ul>');
         return json_encode($obj);
       }else{
         $obj = (object) array('valida' => 0,'html'=>'');
         return json_encode($obj);
       }


   }
   public function dniValidation(Request $request){
     $users = User::all()->where('dni',$request->value);
     if($users->isNotEmpty()){
       $obj = (object) array('valida' => 1, 'html'=>'<ul class="list-unstyled"><li>Ya existe el dni: '.$request->value .' </li></ul>');
       return json_encode($obj);
     }else{
       $obj = (object) array('valida' => 0,'html'=>'');
       return json_encode($obj);
     }
   }
   public function instEmailValidation(Request $request){
     $users = User::all()->where('instEmail',$request->value);
     if($users->isNotEmpty()){
       $obj = (object) array('valida' => 1, 'html'=>'<ul class="list-unstyled"><li>Ya existe el correo institucional: '.$request->value .' </li></ul>');
       return json_encode($obj);
     }else{
       $obj = (object) array('valida' => 0,'html'=>'');
       return json_encode($obj);
     }
   }


    public function destroyValidation($id)
    {
          $user = User::find($id);
          $orders = $user->orders;
          $txt = "";
          //Validando que el trabajador a eliminar no sea el mismo que usa la cuenta
          if(Auth::User()->id==$id){
            $obj = (object) array('caso' => 4, 'titulo' => 'La operación no procede !!' ,'texto' => 'Por regla general , no puede eliminar su propio usuario!'."\nTipo : ".$user->userType->name);
            return json_encode($obj);
          }else 
          //Validando a usuarios Lectores
          if ($user->userType!="1" && $user->userType!="2" && $user->userType!="3" && $user->userType!="4" ) {
            //Caso 1 donde usuario está bloqueado
            if ($user->state == 1) {
              $obj = (object) array('caso' => 3, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general , el alumno ".$user->name." no puede ser eliminado porque esta bloqueado, tiene que devolver el material prestado ");
              return json_encode($obj);
            }else
            
            //Caso 1 donde pedido pendiente
            if($orders->isNotEmpty()){
              foreach ($orders as $i => $order) {
                if ($order->state == 0) {
                  if ($order->orderCopy->materialType == 1) { //Libro
                    $book = Book::find($order->orderCopy->id_material);
                    $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$book->title;
                    $txt = $txt."\nClasificación : ".$book->clasification;
                    $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;

                  }else if ($order->orderCopy->materialType == 2) {//thesis
                    $thesis = Thesis::find($order->orderCopy->id_material);
                    $txt = $txt."\nPedido Thesis|Informe: ".($i+1)."\nTítulo : ".$thesis->title;
                    $txt = $txt."\nClasificación : ".$thesis->clasification;
                    $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;

                  }else if ($order->orderCopy->materialType == 3) {//revista
                    $magazine = Magazine::find($order->orderCopy->id_material);
                    $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$magazine->title;
                    $txt = $txt."\nVolumen : ".$magazine->volume;
                  }

                  if($i>=2){
                    $txt = $txt."\n\n TOTAL DEMÁS PEDIDOS ".($orders->count()-$i-1);
                    break;
                  }

                  $obj = (object) array('caso' => 1, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general , el alumno ".$user->name." no puede ser eliminado porque tiene un pedido pendiente ".$txt);
                  return json_encode($obj);
                }else //Caso 2 donde tiene prestamo pendiente
                if ($order->state==1 && $order->loan->state == 0) {
                  if ($order->orderCopy->materialType == 0) { //Libro
                    $book = Book::find($order->orderCopy->id_material);
                    $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$book->title;
                    $txt = $txt."\nClasificación : ".$book->clasification;
                    $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;
                  }else if ($order->orderCopy->materialType == 1) {//thesis
                    $thesis = Thesis::find($order->orderCopy->id_material);
                    $txt = $txt."\nPedido Thesis|Informe: ".($i+1)."\nTítulo : ".$thesis->title;
                    $txt = $txt."\nClasificación : ".$thesis->clasification;
                    $txt = $txt."\nEjemplar : ".$order->orderCopy->copyNumber;

                  }else if ($order->orderCopy->materialType == 2) {//revista
                    $magazine = Magazine::find($order->orderCopy->id_material);
                    $txt = $txt."\nPedido: ".($i+1)."\nTítulo : ".$magazine->title;
                    $txt = $txt."\nVolumen : ".$magazine->volume;
                  }
                  $obj = (object) array('caso' => 2, 'titulo' => 'Operación no Procede !!' ,'texto' => "Por regla general , el alumno ".$user->name." no puede ser eliminado porque tiene prestamo pendiente sin devolver ".$txt);
                  return json_encode($obj);
                }

              }//endforeach

            }
          }

          //En caso no ocurra ninguno de los casos anteriores
          $obj = (object) array('caso' => 0, 'titulo' => '¿Estás Seguro?' ,'texto' => 'Se eliminará el usuario '.$user->name.'!.'."\nTipo : ".$user->userType->name);
          return json_encode($obj);
    }
  }
