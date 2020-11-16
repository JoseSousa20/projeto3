@extends('layout')
@section('titulo')
Albuns
@endsection
@section('header')
Albuns:
@endsection
@section('conteudo')
<ul>
@foreach($albuns as $album)
<li>
<a style="color:#000000" href="{{route('albuns.show',['id'=>$album->id_album])}}">
<h5>{{$album->titulo}}</h5>
</li>
@endforeach
@endsection