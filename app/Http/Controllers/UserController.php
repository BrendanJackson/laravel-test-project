<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(25);
        return view('admin.users.list', [
            'sorted_column' => 'id',
            'sorted_direction' => 'asc',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = new CreateNewUser();
        if ($user = $action->create($request->post()))
        {
            return redirect()->route('admin.users.list');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $user = User::query()->where('id', $userId)->first();
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $user = User::query()->where('id', $userId)->first();
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Save the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $user = User::query()->where('id', $userId)->first();
        $action = new UpdateUserProfileInformation();
        $action->update($user, $inputs);

        return redirect()->route('admin.users.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
