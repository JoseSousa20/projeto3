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
<a style="color:#000000" href="{{route('musicos.show',['id'=>$musico->id_musico])}}">
<h5>{{$musico->nome}}</h5>
</li>
@endforeach
@endsection