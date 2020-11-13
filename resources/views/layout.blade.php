<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8"/>
      <title>@yield('titulo')</title>
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    </head>
    <body>
       <h1 style="color: #fc03030">@yield('header')</h1>
       @yield('conteudo')
       <br>
       <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{route('musicos.index')}}"><i class="far fa-arrow-alt-circle-right"></i>Musicos</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('musicas.index')}}"><i class="far fa-arrow-alt-circle-right"></i>Musicas</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('albuns.index')}}"><i class="far fa-arrow-alt-circle-right"></i>Albuns</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('generos.index')}}"><i class="far fa-arrow-alt-circle-right"></i>Generos</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/all.min.js')}}"></script>
    </body>
</html>