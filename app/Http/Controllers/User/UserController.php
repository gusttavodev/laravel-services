<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UserStoreRequest;

class UserController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware('verified');
        // $this->middleware('verified')->only('store');
        // $this->middleware('subscribed')->except('store');
    }

    public function index(){
        $users = UserResource::collection(User::paginate(5));
        return Inertia::render('User/Index', [
            'users' => $users
        ]);
    }

    public function create(){
        return Inertia::render('User/Create');
    }

    public function store(UserStoreRequest $request){

        $input = $request->validated();

        // $filePath = $request->file('picture')->store('images/userPicture');

        if(!empty($input['picture'])) $input['picture'] = Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/userPicture', $request->file('picture'));
        if(!empty($input['password'])) $input['password'] = Hash::make($input['password']);

        User::create($input)->assignRole('user');

        return Redirect::route('userIndex')->with('success', 'User updated.');
    }
}
