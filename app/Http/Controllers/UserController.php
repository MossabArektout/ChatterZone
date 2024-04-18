<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Events\OurExampleEvent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    //
    public function register(Request $request){
        $incomingFields = $request -> validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth() -> login($user);
        return redirect('/') -> with('success', 'Thank you for creating an account');
    }

    public function login(Request $request){
        $incomingFields = $request -> validate([
            'loginusername' => 'required',
            'loginpassword' => 'required' 
        ]);

        if (auth() -> attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request -> session() -> regenerate();
            event(new OurExampleEvent(['username' => auth()->user()->username, 'action' => 'Login']));
            return redirect('/') -> with("success","You have successfully logged in. ");
        } else {
            return redirect('/') -> with('failure', 'Invalid login.');
        }
    }

    public function showCorrectHomepage(){
        if (auth()->check()){
            return view('homepage-feed', ['posts' => auth()->user()->feedPosts()->latest()->paginate(3)]);
        }
        else{
            $postCount = Cache::remember('postCount', 20, function(){
                return Post::count();
            });
            return view('homepage', ['postCount'=> Post::count()]);
        }
    }

    public function logout(){
        event(new OurExampleEvent(['username' => auth()->user()->username, 'action' => 'Logout']));
        auth()->logout();
        return redirect('/') -> with('success','You are logged out.');
    }

    private function getSharedData($user){
        $currentlyFollowing = 0;
        if(auth()->check()){
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        }

        View::share('sharedData', ['currentlyFollowing' =>$currentlyFollowing,  'username' => $user->username,'postCount' => $user->posts()->count(), 'followerCount' => $user->followers()->count(), 'followingCount' => $user->followingTheseUsers()->count()]);
    }

    public function profile(User $user){
       
        $this->getSharedData($user);
        return view('profile-posts', ['posts' => $user->posts()->latest()->get()]);
    }

    public function showAvatarForm(){
        return view('avatar-form');
    }

    public function storeAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|max:3000'
        ]);

        $user = auth()->user();
        // generate random text
        $filename = $user->id . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
        Storage::put('public/avatars/' . $filename, $imgData);
    }

    public function profileFollowers(User $user){
        $this->getSharedData($user);
        return view('profile-followers', ['followers' => $user->followers()->latest()->get()]);
    }

    public function profileFollowing(User $user){
        $this->getSharedData($user);

        return view('profile-following', ['following' => $user->followingTheseUsers()->latest()->get()]);
    }
}
