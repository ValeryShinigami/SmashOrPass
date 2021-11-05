@extends('layouts.app2')

@section('Content')

<div class="container d-flex flex-column align-items-center">
    @foreach ($posts as $post)

    <div class="d-flex flex-column">
        <div class="mb-1">{{ $post->user->username }}</div>
        <a href="{{route('posts.show', ['post' => $post->id])}}"><img src="{{asset('storage') . '/' . $post->image }}" class="" alt="" style="width: 400px" height="400px"> {{--on envoi direct le lien de l'utilisateur--}}

        </a>
       {{--<div class="d-flex justify-content-center mt-2">{{$post->description}}</div> --}} 
       <div class="d-flex justify-content-between">
                <div class="mb-5 mt-2">Posté le {{$post->created_at->format('d/m/y')}}</div> 
                <div id="p" class="mr-1 pt-2">{{$post->likers(auth()->user())->count()}} <img src="https://img.icons8.com/external-those-icons-lineal-color-those-icons/17/000000/external-heart-love-those-icons-lineal-color-those-icons.png"/></div>
       </div>
      
    </div>
        
    @endforeach
    
        <div class="d-flex justify-content-center align-items-center">
            {{ $posts->links() }} {{-- ajouter les boutons de pagination --}}
        </div>
      
</div>

    
@endsection