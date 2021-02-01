<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\TeleportHistory;

class UserTeleportsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        Gate::authorize('view-teleport-history');

        $history = TeleportHistory::where('user_id', $id)->get();

        return response()->json($history, 200);
    }
}
