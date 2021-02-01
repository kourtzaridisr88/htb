<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DimensionUsersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $dimension)
    {
        return User::where('dimension_id', $dimension)->get(['id', 'name']);
    }
}
