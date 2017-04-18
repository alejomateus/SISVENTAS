@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-1">
			<h3>Editar Cliente {{ $personas->nombre_persona }}</h3>
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
			

	{!!Form::model($personas,['method'=>'PATCH','route'=>['ventas.cliente.update',$personas->id_persona],'files'=>true])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{ $personas->nombre_persona }}" class="form-control" placeholder="Nombre del cliente...">
			</div>
		</div>	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_documento">Tipo de Documento</label>
				<select name="tipo_documento" class="form-control" >
					
					<option value="Cedula de Ciudadania" 
					@if ($personas->tipo_doc_persona=="Cedula de Ciudadania")
					selected
					@endif>Cedula de Ciudadania</option>
					
					<option value="NIUP" @if ($personas->tipo_doc_persona=="NIUP")
					selected
					@endif>NIUP</option>
					
					<option value="Tarjeta de Identidad" @if($personas->tipo_doc_persona=="Tarjeta de Identidad")
					selected
					@endif>Tarjeta de Identidad</option>
					
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="num_documento">Número de Identificacion</label>
				<input type="text" name="num_documento" required value="{{ $personas->num_doc_persona}}" class="form-control" placeholder="Numero de Identificacion ">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" required value="{{ $personas->dir_persona}}" class="form-control" placeholder="Dirección">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" class="form-control" value="{{$personas->telefono_persona}}" placeholder="Telefono ">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="email">Correo electrónico</label>
				<input type="text" name="email" class="form-control" value="{{$personas->email_persona}}" placeholder="Correo electrónico ">
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