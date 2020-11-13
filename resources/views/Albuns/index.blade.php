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
<h5>{{$album->titulo}}</h5>
</li>
@endforeach
@endsection