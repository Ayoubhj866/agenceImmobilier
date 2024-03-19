@extends('admin.layout')

@section('title', 'Crier un Bien')


@section('content')
    @include('shared.title', ['title' => 'Crée un Bien', 'withButton' => false])
    @include('shared.admin.form')
@endsection
