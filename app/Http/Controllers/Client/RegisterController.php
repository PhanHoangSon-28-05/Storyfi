<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $user;
    protected $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function create()
    {
        return view('layouts.client.create_account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $id_role = $this->role->where('name', 'User')->first();
        $dataCreate = $request->all();
        $dataCreate['password'] = Hash::make($request->password);
        $user = $this->user->create($dataCreate);

        $user->roles()->attach([$id_role->id]);
        Auth::login($user);

        return redirect()->route('home.index')->with('message', 'create success');
    }
}
