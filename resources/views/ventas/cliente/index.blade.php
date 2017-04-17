@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Personas
			<a href="{{url ('ventas/cliente/create')}}"><button class="btn btn-success">Nuevo</button></a>
			</h3>
			@include('ventas.cliente.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Tipo Doc.</th>
						<th>Num Doc.</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Email</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach ($personas as $per)
						<tr>
							<td>{{ $per->id_persona}}</td>
							<td>{{ $per->nombre_persona}}</td>
							<td>{{ $per->tipo_doc_persona}}</td>
							<td>{{ $per->num_doc_persona}}</td>
							<td>{{ $per->dir_persona}}</td>
							<td>{{ $per->telefono_persona}}</td>
							<td>{{ $per->email_persona}}</td>
							
							<td>
								<a href="{{URL::action('ClienteController@edit',$art->id_articulo)}}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$per->id_persona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('ventas.cliente.modal')
						@endforeach
					</tbody>
				</table>
			</div>
			{{$personas->render()}}
		</div>
	</div>
@endsection