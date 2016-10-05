@extends('user.app')
@section('content')
 		<form role="form" method="post" action="{{ url('/register') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="name">Ваше имя</label>
            <input type="text" class="form-control" id="name" placeholder="Ваше имя" name='name'>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name='email'>
          </div>          
          <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
          </div>
          <div class="form-group">
            <label for="confirm_password">Повторите пароль</label>
            <input type="password" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="password_confirmation">
          </div>
          {!! Recaptcha::render() !!}
		
          <button type="submit" class="btn btn-default">Отправить</button>
        </form>
        	@if($errors->any())
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
				@endforeach
			</ul>
		@endif
@stop