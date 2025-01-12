<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\State;

class StateController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index() : view
    {
        $query = State::query();
        $query->with('country');
        $this->search($query, ['name']);
        $states = $query->paginate(20);
        return view('admin.location.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
