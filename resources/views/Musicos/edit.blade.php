@extends('layout')
<form action="{{route('musicos.update', ['id'=>$musico->id_musico])}}" enctype="multipart/form-data" method="post">
@csrf
@method('patch')


Nome: (<b sytle="color:red">*</b>) <input type="text" name="nome" value="{{$musico->nome}}"><br><br>
@if($errors->has('nome'))
<b style="color:red">Deverá ter entre 3 e 100 caracteres</b><br>
@endif

Nacionalidade: (<b sytle="color:red">*</b>) <input type="text" name="nacionalidade" value="{{$musico->nacionalidade}}"><br><br>
@if($errors->has('nacionalidade'))
<b style="color:red">Deverá ter entre 3 e 100 caracteres</b><br>
@endif

Data de Nascimento: (<b sytle="color:red">*</b>) <input type="date" name="data_nascimento" value="{{$musico->data_nascimento->format('Y-m-d')}}"><br><br>
@if($errors->has('data_nascimento'))
<b style="color:red">Formato de data incorreto(DD-MM-AAAA)</b><br>
@endif

Fotografia: <input type="file" name="fotografia" value="{{old('fotografia')}}"><br><br>
@if($errors->has('fotografia'))
<b style="color:red">Fotografia inválida</b><br>
@endif

<input type="submit" value="enviar">
</form>