@extends('layouts.app')

@section('title', 'Inicio')

@section('content') 
  <h1 class="text-5xl text-center pt-24">BIENVENIDO A MI APLICACION {{ Auth::user()->email }}</h1>


@endsection