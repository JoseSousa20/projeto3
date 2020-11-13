@extends('layout')
@section('titulo')
@endsection
@section('header')
@endsection
@section('conteudo')
<ul>
 <b>Titulo: </b>{{$album->titulo}}<br>
 <b>Data de Lançamento: </b>{{$album->data_lancamento}}
@endsection