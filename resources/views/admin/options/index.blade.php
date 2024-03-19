@extends('admin.layout')

@section('title')

@section('content')

    @include('shared.title', [
        'title' => 'Liste des options',
        'withButton' => true,
        'buttonText' => 'Ajouter un option',
    ])



@endsection
