<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return User::all(['id', 'name', 'created_at as join_datetime']);
    }

    /**
     * @param  User  $user
     *
     * @return array
     */
    public function show(User $user)
    {
        return $user->only(['id', 'name', 'created_at as join_datetime']);
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     *
     * @return User
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255|alpha_num|unique:users',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:6',
        ]);

        $user->update($validated);

        return $user;
    }

    /**
     * @param  User  $user
     *
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
