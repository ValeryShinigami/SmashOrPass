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
                <div>{{--$user->profile->title--}}</div>
                <div>{{--$user->profile->description--}}</div>
                <a href="{{--$user->profile->url--}}">{{--$user->profile->url--}}</a>
            </div>
            
        </div>
        
    </div>
    <div class="row">
        @foreach ($user->posts as $post)
        <div class="col-4 mt-5">
            <img src="{{asset('storage') . '/' . $post->image }}" class="w-100" alt=""> {{--on envoi direct le lien de l'utilisateur--}}
        </div>
        @endforeach
        

    </div>
</div>
@endsection
