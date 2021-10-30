<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container">
        <div class="row mt-4">
            <div class="col-4 text-center">
                <img src="{{asset('storage'.'/'. $user->image)}}" width="150px" height="150px" class="rounded-circle" alt="imageProfil">
            </div>
            <div class="col-8">
                <div>
                    <h4>{{$user->username}}</h4> {{-- on récupère la variable $user et son attribut username --}}
                    <div class="d-flex">
                        <button id="smash" class="btn btn-primary" wire:click="addFavoris">favoris</button>
                        <p class="pt-3 ml-2" >or</p>
                        <button id="pass" class="btn btn-danger ml-2">Pass</button>
                    </div>
                    
                </div>

                <div class="d-flex mt-3">
                    <div class="mr-3"> <strong>{{$user->posts->count()}}</strong> publication</div>
                    <div class="d-flex">
                        <div id="smashes" class="mr-1">0</div>
                        <div>smash</div>
                    </div>
                    <div class="d-flex ml-2">
                        <div id="passes" class="mr-1">0</div>
                        <div>pass</div>
                    </div>
                    {{-- count followers  --}}
                    <div class="d-flex ml-2">
                        
                    </div>
                    <form action="{{route('profiles.follow', $user->id)}}" method="POST">
                        @csrf
                        <div class="d-flex ml-2">
                            <div id="passes" class="mr-1">{{$user->followers(auth()->user())->count()}}</div>
                        <button type="submit" class="btn btn-primary">
                            {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'follow'}}
                        </button>
                        </div>
                        
                    </form>
                </div>
                <a href="{{--route('profiles.create', ['user' => $user->username])--}}" class="btn btn-outline-secondary mt-3">Modifier les informations</a>
                <div class="mt-3">
                    <div>{{--$user->profile->caption--}}</div>
                    <div>{{--$user->profile->description--}}</div>
                    <a href="{{--$user->profile->url--}}">{{--$user->profile->url--}}</a>
                </div>
                
            </div>
            
        </div>
        {{-- récupération des images postées par l'utilisateur  --}}
        <div class="row">
            @foreach ($user->posts as $post)
            <div class="col-4 mt-5">
                <a href="{{route('posts.show', ['post' => $post->id])}}"><img src="{{asset('storage') . '/' . $post->image }}" class="w-100" alt=""> {{--on envoi direct le lien de l'utilisateur--}}
    
                </a>
                <div class="d-flex justify-content-center mt-2">{{$post->description}}</div>
                
            </div>
            @endforeach 
        </div>
    </div>
</div>
