<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Resources\User\RoleResource;
use App\Http\Resources\User\UserResource;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        // $this->middleware('verified')->only('store');
        // $this->middleware('subscribed')->except('store');
    }

    public function index()
    {
        $roles         = Role::all();

        $users = UserResource::collection(User::searchUser()->paginate(5));

        return Inertia::render('User/Index', [
            'users'  => $users,
            'roles'  => RoleResource::collection($roles),
        ]);
    }

    public function create()
    {
        $roles =  Role::all();

        return Inertia::render('User/Form', [
            'roles' => $roles,
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $input = $request->validated();

        $input['picture']  = Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/userPicture', $request->file('picture'));
        $input['password'] = Hash::make($input['password']);

        User::create($input)->assignRole('user');

        return Redirect::route('userIndex')->with('success', 'User updated.');
    }

    public function edit(User $user)
    {
        $roles =  Role::all();

        return Inertia::render('User/Form', [
            'roles' => $roles,
            'user'  => new UserResource($user),
        ]);
    }

    public function update(User $user)
    {
        // $roles =  Role::all();

        // return Inertia::render('User/Form', [
        //     'roles' => $roles,
        //     'user' => new UserResource($user)
        // ]);
    }
}
