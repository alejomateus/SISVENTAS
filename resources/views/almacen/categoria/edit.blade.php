@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-1">
			<h3>Editar Categoria {{$categoria->nombre_categoria}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif

			{!!Form::model($categoria,['method'=>'PATCH','route'=>['almacen.categoria.update',$categoria->id_categoria]])!!}
			{{Form::token()}}
			<div class="form-group">
			<label for="nombre"></label>
			<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre_categoria}}" placeholder="Nombre...">
			</div>
			<div class="form-group">
			<label for="descripcion"></label>
			<input type="text" name="descripcion" value="{{$categoria->desc_categoria}}"class="form-control" placeholder="Descripcion...">
			</div>
			<div class="form-group">
			<label for="descripcion"></label>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection