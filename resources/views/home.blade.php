@extends('layouts.app')

@section('title', 'Inicio')

@section('content') 
  <h1 class="text-5xl text-center pt-24">BIENVENIDO AL SISTEMA {{ Auth::user()->persona->nombres }}</h1>


@endsection