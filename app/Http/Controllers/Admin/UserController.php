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
            'worker' => null,
            'workers' => $users,
        ]);

        $show = view('admin.md_users.show',[
            'users' => $users,
            'worker' => null
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
        $u = User::create([
          'username' => $request->code,
          'password' => bcrypt($request->dni),
        ]);
    

      Worker::create([
          'user_id' => $u->id,
          'name' => $request->name,
          'lastname'=> $request->lastName,
          'dni'=> $request->dni,
          'birthday'=> $request->date,
          'phone'=>$request->phone,
          'email'=> $request->email,
          'type'=> $request->type,
          'photo'=>$urlImgName,
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
        $worker = Worker::find($id);
        return  view('admin.md_users.edit', [
           'worker' => $worker,
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
      $worker = $user->worker;
      $urlImgName = ($request->file('urlImg')!=null)?time().$request->file('urlImg')->getClientOriginalName():null;
      
      $worker->name = $request->name;
      $worker->lastname = $request->lastName;
      $worker->dni = $request->dni;
      $worker->birthday = $request->date;
      $worker->email = $request->email ; 
      $worker->phone = $request->phone;
      $worker->type = $request->type;
      if ($urlImgName!=null) {
        $worker->photo = $urlImgName;
      }

      $worker->user->username = $request->code;
      $worker->user->password = bcrypt($request->dni);
      
      $worker->save();
      $user->save();
        
        //Almacenando la imagen con su nombre en la carpeta local solo si el archivo existe
        if($urlImgName!=null) \Storage::disk('localUser')->put($urlImgName, \File::get($request->file('urlImg')));
        
    
        return "0";
    }


    public function information($id)
    {
      $worker = Worker::find($id);
      return  view('admin.md_users.information', [
         'worker' => $worker,
      ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {     $worker = Worker::find($id);
      $txt = "";
      if(Auth::User()->worker->id==$id){
        $obj = (object) array('caso' => 4, 'titulo' => 'La operación no procede !!' ,'texto' => 'Por regla general , no puede eliminar su propio usuario!'."\nTipo : ".$worker->getType());
        return json_encode($obj);
      }
      $worker->user->delete();
      $worker->delete();
      $obj = (object) array('caso' => 0, 'titulo' => 'Operación exitosa!!' ,'texto' => 'Se ha eliminado exitosamente el '.$worker->getType().' '.$worker->name.'!.');
      return json_encode($obj);
            
      }

      
   public function codeValidation(Request $request){
       $users = User::all()->where('username',$request->value);
       if($users->isNotEmpty()){
         $obj = (object) array('valida' => 1, 'html'=>'<ul class="list-unstyled"><li>Ya existe el código: '.$request->value .' </li></ul>');
         return json_encode($obj);
       }else{
         $obj = (object) array('valida' => 0,'html'=>'');
         return json_encode($obj);
       }


   }
   public function dniValidation(Request $request){
     $workers = Worker::all()->where('dni',$request->value);
     if($workers->isNotEmpty()){
       $obj = (object) array('valida' => 1, 'html'=>'<ul class="list-unstyled"><li>Ya existe el dni: '.$request->value .' </li></ul>');
       return json_encode($obj);
     }else{
       $obj = (object) array('valida' => 0,'html'=>'');
       return json_encode($obj);
     }
   }
 


    public function destroyValidation($id)
    {
          $worker = Worker::find($id);
          $txt = "";
          if(Auth::User()->worker->id==$id){
            $obj = (object) array('caso' => 4, 'titulo' => 'La operación no procede !!' ,'texto' => 'Por regla general , no puede eliminar su propio usuario!'."\nTipo : ".$worker->getType());
            return json_encode($obj);
          }
          $obj = (object) array('caso' => 0, 'titulo' => '¿Estás Seguro?' ,'texto' => 'Se eliminará el usuario '.$worker->name.'!.'."\nTipo : ".$worker->getType());
          return json_encode($obj);
    }
  }
