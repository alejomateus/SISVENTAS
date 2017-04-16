<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;
class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query= trim($request->get('searchText'));
    		$categorias= DB:: table('categorias')->where ('nombre_categoria','LIKE',"%$query%")
    		->where ('condi_categoria','=','1')
    		->orderBy('id_categoria','asc')->paginate(7);
    		return view('almacen.categoria.index',['categoria'=>$categorias,'searchText'=>$query]); 
    	}
    }
    public function create()
    {
    	return view ('almacen.categoria.create');
    }
    public function store(CategoriaFormRequest $request)
    {
    	$categoria = new Categoria;
    	$categoria->nombre_categoria=$request->get('nombre');
    	$categoria->desc_categoria=$request->get('descripcion');
    	$categoria->condi_categoria='1';
    	$categoria->save();
    	return Redirect::to ('almacen/categoria');
    }
    public function show($id)
    {
    	return view('almacen.categoria.show',['categoria'=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view('almacen.categoria.edit',['categoria'=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request, $id)
    {
    	$categoria = Categoria::findOrFail($id);
    	$categoria->nombre_categoria=$request->get('nombre');
    	$categoria->desc_categoria=$request->get('descripcion');
    	$categoria->update();
    	return Redirect::to ('almacen/categoria');
    }
    public function destroy($id)
    {
    	$categoria = Categoria::findOrFail($id);
    	$categoria->condi_categoria='0';
    	$categoria->update();
    	return Redirect::to ('almacen/categoria');
    }
}
