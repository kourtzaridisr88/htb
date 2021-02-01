<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\User;
use App\TeleportHistory;

class UserDimensionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user, $dimensionID)
    {
        if (
            isset($user->last_teleport_at) && 
            Carbon::now()->diffInSeconds($user->last_teleport_at) < 10
        ) {
            throw new AuthorizationException('Be aware traveller. You cant teleport so fast!');
        }

        $user->dimension_id = $dimensionID;
        $user->last_teleport_at = Carbon::now();

        $user->update();

        TeleportHistory::create([
            'user_id' => $user->id,
            'dimension_id' => $dimensionID
        ]);
    }
}
