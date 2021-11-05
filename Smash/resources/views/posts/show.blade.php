@extends('layouts.app2')

@section('Content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{asset('storage' .'/'. $post->image)}}" class="w-100" alt="">
        </div>
        {{--<form>
            <input type="button" value="back" onclick="history.go(-1)">
          </form>--}}
        <div class="col-4">
            <div class="d-flex align-items-center">
                <h3 class="pt-2">{{$post->user->username}}</h3>
                {{-- bouton pour retour à l'url précédent --}}
                <a href="{{ URL::previous() }}"  class="btn btn-default" role="button"><img src="https://img.icons8.com/fluency/28/000000/circled-left-2.png"/></a>
            </div>
            
            <p>{{$post->caption}}</p>
            <p>{{$post->description}}</p>

           
{{--********************************************************************** --}}
        <form action="{{route('posts.like', $post->id)}}" method="POST">
            @csrf
            <div class="d-flex ml-2">
                 <div id="p" class="mr-1 pt-2">{{$post->likers(auth()->user())->count()}}</div>
                <button type="submit" class="btn btn-primary">
                        {{auth()->user()->isliking($post) ? 'dislike' : 'like'}}
                </button>
            </div>
        </form>
           @comments(['model' => $post, 'maxIndentationLevel' => 0, 'perPage' => 2]) 
        </div> 
    </div>



</div>
    
@endsection
