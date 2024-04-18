<?php

use App\Events\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/login', [UserController::class, 'login'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('auth');

Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('auth');

Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);

Route::get('/profile/{user:username}', [UserController::class, 'profile']); // the name of the function

Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('can:delete,post');

Route::get('/post/{post}/edit', [PostController::class, 'showEditForm'])->middleware('can:update,post');

Route::put('/post/{post}', [PostController::class, 'actuallyUpdate'])->middleware('can:update,post');

Route::get('/admin-only', function(){
    return 'only admin can see this page';
})->middleware('can:visitAdminPages');

Route::get('/manage-avatar', [UserController::class, 'showAvatarForm'])->middleware('auth');

Route::post('/manage-avatar', [UserController::class, 'storeAvatar'])->middleware('auth');

Route::post('/create-follow/{user:username}', [FollowController::class, 'createFollow'])->middleware('auth');

Route::post('/remove-follow/{user:username}', [FollowController::class, 'removeFollow'])->middleware('auth');

Route::get('/profile/{user:username}/followers', [UserController::class, 'profileFollowers']);

Route::get('/profile/{user:username}/following', [UserController::class, 'profileFollowing']);

Route::get('/search/{term}', [PostController::class, 'search']);


//chat route
Route::post('/send-chat-message', function(Request $request){
    $formFields = $request -> validate([
        'textvalue' => 'required'
    ]);
    
    if (!trim(strip_tags($formFields['textvalue']))){
        return response()->noContent();
    }

    broadcast(new ChatMessage(['usernamae' => auth()->user()-> username, 'textvalue' => strip_tags($request->textvalue), 'avatar' => auth()->user()->avatat]))->toOthers();
    return response()->noContent();

})->middleware('auth');