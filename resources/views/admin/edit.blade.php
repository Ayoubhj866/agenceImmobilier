@extends('admin.layout')


@section('title', 'edit' . $property->title)

@section('content')
    @include('shared.title', ['title' => 'Edit un bien', 'withButton' => false])


    @include('shared.admin.form')


@endsection
