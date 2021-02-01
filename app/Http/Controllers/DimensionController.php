<?php

namespace App\Http\Controllers;

use App\Dimension;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    /**
     * @return Dimension[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Dimension::with(['users' => function($query) {
            return $query
                ->select('users.id', 'users.name', 'users.dimension_id')
                ->selectRaw('COUNT(DISTINCT teleport_histories.id) as times_visited_dimension')
                ->leftJoin('teleport_histories', function($join) {
                    $join->on('users.dimension_id', '=', 'teleport_histories.dimension_id');
                    $join->on('users.id', '=', 'teleport_histories.user_id');
                })
                ->groupBy(['users.id']);
        }])->get(['id', 'name']);
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|min:3|max:64|unique:dimensions,name']);

        return Dimension::create($validated);
    }

    /**
     * @param  Dimension  $dimension
     *
     * @return array
     */
    public function show(Dimension $dimension)
    {
        return $dimension->only(['id', 'name']);
    }

    /**
     * @param  Request  $request
     * @param  Dimension  $dimension
     */
    public function update(Request $request, Dimension $dimension)
    {
        $validated = $request->validate(['name' => 'required|string|min:3|max:64|unique:dimensions,name']);

        $dimension->update($validated);
    }

    /**
     * @param  Dimension  $dimension
     *
     * @throws \Exception
     */
    public function destroy(Dimension $dimension)
    {
        $dimension->delete();
    }
}
