<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Technology $technology)
    {
        //
    }

    public function edit(Technology $technology)
    {
        //
    }

    public function update(Request $request, Technology $technology)
    {
        //
    }

    public function destroy(Technology $technology)
    {
        // scollego le tecnologie associate
        $technology->projects->detach();

        $technology->delete();
        return to_route('admin.technologies.index')->with('delete_success', $technology);
    }
}
