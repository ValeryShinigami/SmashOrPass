<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;






class ProfileController extends Controller
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
    public function create(User $user)
    {
        //
        return view ('profiles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
     //dd($user);
        // retourne la vue du profile connecté
        return view ('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('profiles.edit', compact('user'));

        //dd($user);

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

    public function follow($userId)
    {
        $user = User::find($userId);
        //dd($user);
        if (auth()->user()->isFollowing($user)) {
            # code...
            $user->revokeFollower(auth()->user());
        }else {
            # code...
            auth()->user()->follow($user);
        }
        return redirect()->route('profiles.show', compact('user'));
    }

    public function follow2($userId)
    {
        $user = User::find($userId);
        dd($user);
      
        
        return view('profiles.follow2', compact('user'));
    }

}
