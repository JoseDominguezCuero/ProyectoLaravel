<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PersonaController extends Controller
{
    function mostrar($nombre_usuario=null){
        if($nombre_usuario == null){
            return 'Debe ingresar un nombre de usuario';        
            }
            return 'Nombre usuario='.$nombre_usuario;
    }

    function show(){
        $list=User::all();//select *from
        return view('user/list',['users'=>$list]);
    }

    function form($id=null){
        $user=new User();
        if($id!=null){
            $user= User::findOrFail($id);

        }
        return view('user/form',['user'=>$user]);
    }
    function save(Request $request){
      
        $request->validate([
            "name"=>'required|max:50',
           
        ]);

        $user=new User();
        if($request->id>0){
            $user=User::findOrFail($request->id);
        }
        $user->name=$request->name;       
        
        $user->save();
        return redirect('/users')->with('message','Usuario guardado');
       
    }
    function delete($id){
        $user= User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('message','Usuario eliminado');
    }
}

