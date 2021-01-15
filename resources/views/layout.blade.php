<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8"/>
      <title>@yield('titulo')</title>
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    </head>
    <body style="background-color: #c4c4c4">
       <h1 style="color: #fc03030">@yield('header')</h1>
       @yield('conteudo')
       @if(session()->has('msg'))
            <div class="alert alert-danger" role="alert">
                {{session('msg')}}
            </div>
        @endif
       <br>
       <br>
       <nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('musicos.index')}}">Musicos</a>
      <a class="nav-item nav-link" href="{{route('musicas.index')}}">Musicas</a>
      <a class="nav-item nav-link" href="{{route('generos.index')}}">Generos</a>
      <a class="nav-item nav-link" href="{{route('albuns.index')}}">Albuns</a>
      <a class="nav-item nav-link"></a>
      <a class="nav-item nav-link">|</a>
      <a class="nav-item nav-link"></a>
      @guest
        @if (Route::has('login'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
        @endif
                            
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
        @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
              </form>
             </div>
          </li>
      @endguest
    </div>
  </div>
</nav>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/all.min.js')}}"></script>
    </body>
</html>