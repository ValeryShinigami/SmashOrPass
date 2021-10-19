<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // pour que la fonction soit accessible uniquement aux utilisateurs connecté on crée un middleware
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function publication()
     {
       $users = auth()->user()->pluck('id');
       //dd($users);
       //je récupère les posts de ma colone username dans la table users
        $posts = Post::whereIN('user_id', $users)->with('user')->latest()->paginate(4); 
      // dd($posts);

       return view ('posts.publications', compact('posts'));
     }
    
    public function create()
    {
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des champs 
        $data = request()->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image'],
            'description' => ['required', 'string']
            
        ]);
        //dd(request('image'));
        $imagePath = request('image')->store('uploads', 'public'); //la fonction store place l'image dans le fichier upload de storage

        //utilisation de la facade intervention image installé avec composer require intervention/image
        //public_path permet de pointer vers le dossier public 
        //
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000,1000);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'description' => $data['description']
        ]);

        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        //dd($post);
       
        return view('posts.show', compact('post'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function like(): JsonResponse
    {
        $post = Post::find(request()->id); //on récupère notre post

        if ($post->likeUser()){
            $res = like::where([
                'user_id' => auth()->user()->id,
                'post_id' => request()->id
            ])->delete();

                if ($res) {
                    # code...
                    return response()->json([
                        'count' => Post::find(request()->id)->likes->count()
                    ]);
                }

        }else {
            $like = new like();

            $like->user_id = auth()->user()->id;
            $like->post_id = request()->id;

            $like->save();

            return response()->json([
                'count' => Post::find(request()->id)->likes->count()
            ]);
        }
    }
    
}
