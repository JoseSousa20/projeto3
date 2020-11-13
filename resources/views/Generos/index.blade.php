@extends('layout')
@section('titulo')
Generos
@endsection
@section('header')
Generos:
@endsection
@section('conteudo')
<ul>
@foreach($generos as $genero)
<li>
<h5>{{$genero->designacao}}</h5>
</li>
@endforeach
@endsection