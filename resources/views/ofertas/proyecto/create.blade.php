@extends('layouts.app')

@section('title', 'Nuevo proyecto')

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/ofertas/proyecto/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nuevo proyecto
				</button>
			</a>
			<hr>
			<p style="color: #bbb;">* Campos obligatorios</p>
		</div>
		<div class="col-md-9">
  			<h3>Nuevo proyecto</h3>
			<hr>
			<div>
				@if (count($errors) > 0)
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<ul>
							@foreach ($errors->all() as $error)
						  		<li>{{ $error }}</li>
						  	@endforeach
						</ul>
					</div>
				@endif
			</div>
		
		{!! Form::open(array('url'=>'ofertas/proyecto', 'method'=>'POST', 'autocomplete'=>'off')) !!}
		{{ Form::token() }}
			
			<div class="form-group">
				<label for="nombre" class="control-label">Nombre*</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre del proyecto" value="{{ old('nombre') }}"></input>
			</div>

			<div class="form-group">
				<label for="descripcion" class="control-label">Descripción*</label>
				<textarea name="descripcion" class="form-control" placeholder="Descripción del proyecto">{{ old('descripcion') }}</textarea>
			</div>

			<div class="form-group">
				{!! Form::label('carreras', 'Carreras*') !!}
				{!! Form::select('carrera_id[]', $carreras, null, ['class'=>'form-control select-carrera', 'multiple']) !!}
			</div>

			<div class="form-group text-right">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<input name="user_id" id="user_id" type="hidden" value="{{ Auth::user()->id }}"></input>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
					  	  			
		{!! Form::close() !!}

		</div>
	</div>

@push('scripts')
	<script>
		$('.select-carrera').chosen({
			placeholder_text_multiple: 'Seleccione las carreras relacionadas al proyecto'
		});
	</script>
@endpush

@endsection