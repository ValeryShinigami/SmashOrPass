@extends('layouts.app2')

@section('Content')
@livewire('profiles', ['user' => $user])
@endsection
