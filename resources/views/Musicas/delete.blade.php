@extends('layout')
<h2>Deseja eliminar a Musica</h2>
<h2>{{$musica->titulo}}</h2>
<form action="{{route('musicas.destroy', ['id'=>$musica->id_musica])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$musica->id_musica}}">
    <input type="submit" value="Eliminar">
</form>