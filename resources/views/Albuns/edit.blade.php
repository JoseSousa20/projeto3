@extends('layout')
<form action="{{route('albuns.store', ['id'=>$album->id_album])}}" enctype="multipart/form-data" method="post">
@csrf
@method('patch')

Titulo: (<b sytle="color:red">*</b>) <input type="text" name="titulo" value="{{$album->titulo}}"><br><br>
@if($errors->has('titulo'))
<b style="color:red">Deverá ter entre 3 e 100 caracteres</b><br>
@endif

Data de Lançamento: (<b sytle="color:red">*</b>) <input type="date" name="data_lancamento" value="{{$album->data_lancamento->format('Y-m-d')}}"><br><br>
@if($errors->has('data_lancamento'))
<b style="color:red">Formato de data incorreto(DD-MM-AAAA)</b><br>
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


Observações: <input type="text" name="observacoes" value="{{$album->observacoes}}"><br><br>
@if($errors->has('observacoes'))
<b style="color:red">Deverá ter entre 3 e 100 caracteres</b><br>
@endif
<input type="submit" value="enviar">
</form>