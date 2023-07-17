<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',[
           'users'=> Users::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create'
//            [
//            'permissions' => Permission::pluck('name', 'id')->toArray(),
//            'roles' => Role::pluck('name', 'id')->toArray()
//        ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request):RedirectResponse
    {
        $user = User::create($request->validated());
//        $user->syncRoles($request->roles);
//        $user->syncPermissions($request->permissions);
        Splade::toast('User created')->success()->centerTop()->autoDismiss(3);

        return to_route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user):View
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user):RedirectResponse
    {
        $user->update($request->validated());
//        $user->syncRoles($request->roles);
//        $user->syncPermissions($request->permissions);
        Splade::toast('User updated')->success()->centerTop()->autoDismiss(3);

        return to_route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Splade::toast('User deleted')->success()->centerTop()->autoDismiss(3);
        return back();
    }
}
