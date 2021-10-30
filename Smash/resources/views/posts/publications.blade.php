@extends('layouts.app2')

@section('Content')

<div class="container d-flex flex-column align-items-center">
    @foreach ($posts as $post)

    <div class="d-flex flex-column">
        <div class="mb-1">{{ $post->user->username }}</div>
        <a href="{{route('posts.show', ['post' => $post->id])}}"><img src="{{asset('storage') . '/' . $post->image }}" class="" alt="" style="width: 400px" height="400px"> {{--on envoi direct le lien de l'utilisateur--}}

        </a>
       {{--<div class="d-flex justify-content-center mt-2">{{$post->description}}</div> --}} 
        <div class="mb-5 mt-2">Posté le {{$post->created_at->format('d/m/y')}}</div> 
    </div>
        
    @endforeach
        <div class="d-flex justify-content-center align-items-center">
            {{ $posts->links() }} {{-- ajouter les boutons de pagination --}}
        </div>
      
</div>

    
@endsection