@extends('layout')
<form action="{{route('albuns.store')}}" enctype="multipart/form-data" method="post">
@csrf

Titulo: (<b sytle="color:red">*</b>) <input type="text" name="titulo" value="{{old('titulo')}}"><br><br>
@if($errors->has('titulo'))
<b style="color:red">Deverá ter entre 3 e 100 caracteres</b><br>
@endif

Musico: (<b sytle="color:red">*</b>)
<select name="id_musico">
@foreach ($musicos as $musico)
    <option value="{{$musico->id_musico}}">{{$musico->nome}}</option>
@endforeach
</select>
<br>
<br>
@if($errors->has('id_musico'))
<b style="color:red">Tem que escolher um musico</b><br>
@endif


Musica: (<b sytle="color:red">*</b>)
<select name="id_musica">
@foreach ($musicas as $musica)
    <option value="{{$musica->id_musica}}">{{$musicas->titulo}}</option>
@endforeach
</select>
<br>
<br>
@if($errors->has('id_musica'))
<b style="color:red">Tem que escolher um album</b><br>
@endif


Genero: (<b sytle="color:red">*</b>)<br>

<select name="id_genero">
@foreach ($generos as $genero)
    <option value="{{$genero->id_genero}}">{{$genero->designacao}}</option>
@endforeach
</select>
<br>
<br>
@if($errors->has('id_genero'))
<b style="color:red">Tem que escolher um Genero</b><br>
@endif
<input type="submit" value="enviar">
</form>