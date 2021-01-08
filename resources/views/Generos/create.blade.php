@extends('layout')
<form action="{{route('generos.store')}}" enctype="multipart/form-data" method="post">
@csrf
Designação: (<b sytle="color:red">*</b>) <input type="text" name="designacao" value="{{old('designacao')}}"><br><br>
@if($errors->has('designacao'))
<b style="color:red">Deverá ter entre 3 e 100 caracteres</b><br>
@endif

Observações: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
@if($errors->has('observacoes'))
<b style="color:red">Deverá ter entre 3 e 100 caracteres</b><br>
@endif

<input type="submit" value="enviar">
</form>