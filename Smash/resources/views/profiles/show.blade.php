@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-4 text-center">
            <img src="{{asset('image/smashprofil.png')}}" width="150px" height="150px" class="rounded-circle" alt="imageProfil">
        </div>
        <div class="col-8">
            <div>
                <h4>{{$user->username}}</h4> {{-- on récupère la variable $user et son attribut username --}}
                <button class="btn btn-primary">Smash</button>
                <button class="btn btn-danger">Pass</button>
            </div>
            <div class="d-flex mt-3">
                <div class="mr-3"> <strong>25</strong> publication</div>
                <div class="mr-3"> <strong>300</strong> smashes</div>
                <div class="mr-3"> <strong>4</strong> passes</div>
            </div>
            <div class="mt-3">
                <div> laravel framework</div>
                <div>love beautiful code we do too</div>
                <a href="#">bla bla bla bla</a>
            </div>
            
        </div>
        
    </div>
    <div class="row">
        <div class="col-4">
            <img src="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="w-100" alt="">
        </div>
        <div class="col-4">
            <img class="w-100" src="" alt="">
        </div>

    </div>
</div>
@endsection
