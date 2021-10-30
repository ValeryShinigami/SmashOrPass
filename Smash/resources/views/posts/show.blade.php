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

           <div class="d-flex">
               <div class="mr-3">
                <form action="{{route('posts.like')}}" id="form-js" >
                    <div class="text-center" id="count-js">{{$post->likes->count()}}</div>
                    <input type="hidden" id="post-id-js" value="{{$post->id}}">
                    <button type="submit" class="btn btn-primary">smash</button>
                </form>
               </div>
               <div>
                <form action="{{route('posts.like')}}" id="form-js" >
                    <div class="text-center" id="count-js">{{$post->likes->count()}}</div>
                    <input type="hidden" id="post-id-js" value="{{$post->id}}">
                    <button type="submit" class="btn btn-danger">pass</button>
                </form>
               </div>
            
            
           </div>
           
        </div> 
    </div>



</div>
    
@endsection
