<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @param  Request  $request
     *
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|alpha_num|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'dimension_id' => 'required|int|exists:dimensions,id'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return $user;
    }
}
