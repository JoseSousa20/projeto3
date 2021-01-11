@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Designacao: </b>{{$generos->designacao}}<br>
 <b>Observações: </b>{{$generos->observacaoes}}<br>
@endsection