<?php 

namespace App\Http\Controllers;

use App\Cliente;
use App\Usuario;
use Illuminate\Http\Request;

class clientesController extends Controller
{
  public function index()
  {
    //$cliente = Cliente::all();
    $cliente = Cliente::with('user')->get();
    return response()->json($cliente, 200);
  }
    public function users()
    {
        $usuario = Usuario::where('tipo_cuenta', 'Cliente')->get();
        return response()->json($usuario, 200);
    }
    public function createUser(Request $request)
    {
      $usuario = Usuario::create([
          'nombre' => $request['nombre'],
          'nombredeusuario' => $request['nombredeusuario'],
          'appaterno' => $request['appaterno'],
          'apmaterno' => $request['apmaterno'],
          'fecha_nac' => $request['fecha_nac'],
          'telefono' => $request['telefono'],
          'tipo_cuenta' => 'Cliente',
          'email' => $request['email'],
          'password' => app('hash')->make($request['password']),
      ]);
      return response()->json($usuario,201);
    }
  public function getCliente($id)
  {
    $cliente = Cliente::find($id);
    if($cliente)
    {
      return response()->json($cliente, 200);
    }
    return response()->json(["cliente no encontrado"], 404);
  }
  public function getClientes($user_id)
  {
    $clientes = Cliente::where('user_id', $user_id)->get();
    if($clientes)
    {
        return response()->json($clientes, 200);
    }
    return response()->json(["clientes no encontrados"], 404);
  }

  public function createCliente(Request $request)
  {
//      $usuario = Usuario::create([
//          'nombre' => $request['nombre'],
//          'nombredeusuario' => $request['nombredeusuario'],
//          'appaterno' => $request['appaterno'],
//          'apmaterno' => $request['apmaterno'],
//          'fecha_nac' => $request['fecha_nac'],
//          'telefono' => $request['telefono'],
//          'tipo_cuenta' => 'Cliente',
//          'email' => $request['email'],
//          'password' => app('hash')->make($request['password']),
//      ]);
      $cliente = Cliente::create([
          'cli_nombre' => $request['cli_nombre'],
          'cli_direccion' => $request['cli_direccion'],
          'cli_zona' => $request['cli_zona'],
          'user_id' => $request['user_id'],
      ]);
      return response()->json($cliente,201);
  }
  public function updateCliente(Request $request, $id)
  {     
    $cliente = Cliente::where('id', $id)
    ->update([
      'cli_direccion' => $request['cli_direccion'],
      'cli_zona' => $request['cli_zona'],
      ]);
    return response()->json($cliente,201);
  }
  public function destroyCliente($id)
  {
    $cliente = Cliente::destroy($id);
    return response()->json($cliente,201);
  }
}