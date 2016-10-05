@extends('user.app')
@section('content')
        <form role="form" method="post" action="{{ url('/login') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name='email'>
          </div>
          <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
          </div>
          <button type="submit" class="btn btn-default">Отправить</button>
        </form>
@stop