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
@if(auth()->check())
<a href="{{route('albuns.create')}}" class="btn btn-secondary">Adicionar Album</a>
@endif
@endsection