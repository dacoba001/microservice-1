<?php 

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
 public function index()
 {
  $usuario = Usuario::all();
  return response()->json($usuario, 200);
 }

 public function getUsuario($id)
 {
  $usuario = Usuario::find($id);
  if($usuario)
  {
   return response()->json($usuario, 200);
  }
  return response()->json(["Usuario no encontrado"], 404);
 }

 public function createUsuario(Request $request)
  {
        $usuario = Usuario::create($request->all());
        return response()->json($usuario,201);  
    }
}