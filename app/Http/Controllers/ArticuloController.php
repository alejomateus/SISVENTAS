<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ArticuloFormRequest;
use App\Articulo;
use DB;

class ArticuloController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query= trim($request->get('searchText'));
    		$articulos= DB:: table('articulos as a')
    		->join('categorias as c','a.id_categoria','=','c.id_categoria')
    		->select('a.*','c.nombre_categoria as categoria')
    		->where ('a.nombre_articulo','LIKE',"%$query%")
            ->orwhere ('a.codigo_articulo','LIKE',"%$query%")
    		->orderBy('a.id_articulo','desc')
    		->paginate(7);
    		return view('almacen.articulo.index',['articulos'=>$articulos,'searchText'=>$query]); 
    	}
    }
    public function create()
    {
    	$categorias=DB::table('categorias')->where ('condi_categoria','=',"1")->get();
    	return view ('almacen.articulo.create',["categorias"=>$categorias]);
    }
    public function store(ArticuloFormRequest $request)
    {
    	$articulo = new Articulo;
    	$articulo->id_categoria=$request->get('categoria');
    	$articulo->codigo_articulo=$request->get('codigo');
    	$articulo->nombre_articulo=$request->get('nombre');
    	$articulo->stock_articulo=$request->get('stock');
    	$articulo->desc_articulo=$request->get('descripcion');
    	$articulo->estado_articulo='Activo';
    	if (Input::hasFile('imagen')){
    		$file=Input::file('imagen');
    		$file->move(public_path()."/Imagenes/articulos/",$file->getClientOriginalName());
    		$articulo->imagen_articulo=$file->getClientOriginalName();
    	}
    	$articulo->save();
    	return Redirect::to ('almacen/articulo');
    }
    public function show($id)
    {	

    	return view('almacen.articulo.show',['articulo'=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categorias')->where ('condi_categoria','=',"1")->get();
    	return view('almacen.articulo.edit',['articulo'=>$articulo,"categorias"=>$categorias]);
    }
    public function update(ArticuloFormRequest $request, $id)
    {
    	$articulo = Articulo::findOrFail($id);
    	$articulo->id_categoria=$request->get('categoria');
    	$articulo->codigo_articulo=$request->get('codigo');
    	$articulo->nombre_articulo=$request->get('nombre');
    	$articulo->stock_articulo=$request->get('stock');
    	$articulo->desc_articulo=$request->get('descripcion');
    	
    	if (Input::hasFile('imagen')){
    		$file=Input::file('imagen');
    		$file->move(public_path()."/Imagenes/articulos/",$file->getClientOriginalName());
    		$articulo->imagen_articulo=$file->getClientOriginalName();
    	}
    	$articulo->update();
    	return Redirect::to ('almacen/articulo');
    }
    public function destroy($id)
    {
    	$articulo = Articulo::findOrFail($id);
    	$articulo->estado_articulo='Inactivo';
    	$articulo->update();
    	return Redirect::to ('almacen/articulo');
    }
}
