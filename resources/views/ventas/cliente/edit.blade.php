@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-1">
			<h3>Editar Articulo {{$articulo->nombre_articulo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif
		</div>
	</div>
			

	{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->id_articulo],'files'=>true])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{ $articulo->nombre_articulo}}" class="form-control" placeholder="Nombre...">
			</div>
		</div>	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="select">Categoria</label>
				<select name="categoria" class="form-control" >
					@foreach ($categorias as $cat)
					@if($cat->id_categoria==$articulo->id_categoria)
					<option value="{{$cat->id_categoria}}" selected>{{$cat->nombre_categoria}} </option>
					@else
					<option value="{{$cat->id_categoria}}" >{{$cat->nombre_categoria}} </option>
					@endif
					@endforeach	
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="codigo">Código</label>
				<input type="text" name="codigo" required value="{{ $articulo->codigo_articulo}}"" class="form-control" placeholder="Codigo del articulo ">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="text" name="stock" required value="{{ $articulo->stock_articulo}}"" class="form-control" placeholder="Stock del articulo ">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" class="form-control" value="{{ $articulo->desc_articulo}}"" placeholder="Descripción del articulo ">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">Imagen</label>
				<input type="file" name="imagen" class="form-control"  >
				<img src="@if($articulo->imagen_articulo){{ asset('Imagenes/articulos/'.$articulo->imagen_articulo)}} @else {{ asset('Imagenes/articulos/nti.jpg')}} @endif" alt="{{ $articulo->nombre_articulo}}" height="100px" width="100px" class="img-thumbnail">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>			
	{!!Form::close()!!}
		
@endsection