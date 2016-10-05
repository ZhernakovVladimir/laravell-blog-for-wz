@extends('user.app')
@section('content')
	<h1>Страница контактов</h1><br><hr>


	{!! Form::open(['url'=>'/contact']) !!}	
	<h3> Форма обратной связи </h3>
				<div class="form-group">
					{!! Form::label('fio','ФИО') !!}
					{!! Form::text('fio', null,['class'=>'form-control'] )!!}
		
				</div>


				<div class="form-group">
					{!! Form::label('Telephone','Телефон:+38(xxx)-xxx-xx-xx') !!}
					{!! Form::text('Telephone',null,['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email','Ваш email') !!}
					{!! Form::text('email',null,['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('messagetext','Сообщение') !!}
					{!! Form::textarea('messagetext',null,['class'=>'form-control']) !!}
				</div>			

				{!! Recaptcha::render() !!}
		
				<div class="form-group">		
					{!! Form::submit('Выслать контактные даные', ['class'=>'btn btn-primary']) !!}
				</div>

	{!! Form::close() !!}	

	@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
		<li>{!! $error !!}</li>
		@endforeach
	</ul>
	@endif

	@if(isset($message))
	<ul class="alert alert-success">

		<li>{{  $message }}</li>
	
	</ul>
	@endif	
@stop