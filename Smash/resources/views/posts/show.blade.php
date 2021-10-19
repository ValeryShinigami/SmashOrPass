@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{asset('storage' .'/'. $post->image)}}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <h3>{{$post->user->username}}</h3>
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
