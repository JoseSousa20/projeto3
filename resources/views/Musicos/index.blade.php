@extends('layout')
@section('titulo')
Musicos
@endsection
@section('header')
Musicos:
@endsection
@section('conteudo')
<ul>
@foreach($musicos as $musico)
<li>
<h5>{{$musico->nome}}</h5>
</li>
@endforeach
@endsection