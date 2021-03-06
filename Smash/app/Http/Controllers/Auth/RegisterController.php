<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Notifications\RegisterNotification;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'], //on rajoute la validation username
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required', 'image']
        ]);
        
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $imagePath = request('image')->store('uploads', 'public'); //la fonction store place l'image dans le fichier upload de storage
        $image = Image::make(public_path("/storage/{$imagePath}"));
        $image->save();
            //$registered_user = User::first();
            $registered_user = User::create([
            'name' => $data['name'],
            'username' => $data['username'], //on r??cup??re le username
            'email' => $data['email'],
            'image' => $imagePath,
            'password' => Hash::make($data['password'])
        ]);
      
        $registered_user->notify(new RegisterNotification());

        return $registered_user;
        
    }
    


    private function storeImage(User $user) 
    {
        if (request('image')) {
            $user->update([
                'image' => request('image')->store('avatars', 'public'),
            ]);
        }
    }
}
