<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\User;

class LoginController extends Controller
{
    use ThrottlesLogins;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        $validated = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            $this->incrementLoginAttempts($request);

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }

        $this->clearLoginAttempts($request);

        $user->token = $user->createToken('authToken')->accessToken;

        return response()->json($user, 201);
    }

    /**
     * Get the field that user uses for log in.
     *
     * @return string
     */
    private function username()
    {
        return 'email';
    }
}
