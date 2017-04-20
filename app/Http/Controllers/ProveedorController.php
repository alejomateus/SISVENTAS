<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;
use DB;

class ProveedorController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query= trim($request->get('searchText'));
    		$personas= DB:: table('personas')->where ('nombre_persona','LIKE',"%$query%")
    		->where ('tipo_persona','=','Proveedor')
    		->orwhere ('num_doc_persona','LIKE',"%$query%")
    		->where ('tipo_persona','=','Proveedor')
    		->orderBy('id_persona','desc')->paginate(7);
    		return view('compras.proveedor.index',['personas'=>$personas,'searchText'=>$query]); 
    	}
    }
    public function create()
    {
    	return view ('compras.proveedor.create');
    }
    public function store(PersonaFormRequest $request)
    {
    	$persona = new Persona;
    	$persona->tipo_persona="Proveedor";
    	$persona->nombre_persona=$request->get('nombre');
    	$persona->tipo_doc_persona=$request->get('tipo_documento');
    	$persona->num_doc_persona=$request->get('num_documento');
    	$persona->dir_persona=$request->get('direccion');
    	$persona->telefono_persona=$request->get('telefono');
    	$persona->email_persona=$request->get('email');
    	$persona->save();
    	return Redirect::to ('compras/proveedor');
    }
    public function show($id)
    {
    	return view('compras.proveedor.show',['personas'=>Persona::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view('compras.proveedor.edit',['personas'=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request, $id)
    {
    	$persona = Persona::findOrFail($id);
		$persona->nombre_persona=$request->get('nombre');
    	$persona->tipo_doc_persona=$request->get('tipo_documento');
    	$persona->num_doc_persona=$request->get('num_documento');
    	$persona->dir_persona=$request->get('direccion');
    	$persona->telefono_persona=$request->get('telefono');
    	$persona->email_persona=$request->get('email');
    	$persona->update();
    	return Redirect::to ('compras/proveedor');
    }
    public function destroy($id)
    {
    	$categoria = Persona::findOrFail($id);
    	$categoria->tipo_persona='Inactivo';
    	$categoria->update();
    	return Redirect::to ('compras/proveedor');
    }
}
