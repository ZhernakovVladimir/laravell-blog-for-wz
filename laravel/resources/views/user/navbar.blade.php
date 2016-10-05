
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Категории</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Теги <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @foreach($tags as $tag)
                <li><a href="/tags/{{ $tag->url }}">{{ $tag->name }}</a></li>
                @endforeach()
              </ul>
            </li>
            <li><a href="/anonce">Анонс</a></li>
            @if($static_pages['about'])
            <li><a href="/about">О нас</a></li>
            @endif
            
            @if($static_pages['contact'])
            <li><a href="/contact">Контакты</a></li>
            @endif
          </ul>
          @if(Auth::check())
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Вы авторизированы как {{ Auth::user()->name}}</a> </li>
            <li><a href="/logout">Выход</a> </li>
          </ul>
          @else
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Войти</a> </li>
            <li><a href="/register">Регистрация</a> </li>
          </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>


