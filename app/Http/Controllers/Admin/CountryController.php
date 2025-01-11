<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Country;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;

class CountryController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index() : view
    {
        $query = Country::query();
        $this->search($query, ['name']);
        $countries = $query->orderBy('id', 'DESC')->paginate(20);
        return view('admin.location.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.location.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:countries,name']
        ]);
        $type = new Country();
        $type->name = $request->name;
        $type->save();


        Notify::createdNotification();

        return to_route('admin.countries.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $country = Country::findOrFail($id);
        return view('admin.location.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:countries,name,'.$id]
        ]);
        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->save();


        Notify::updatedNotification();

        return to_route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Country::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please, Try Again!'], 500);
        }
    }
}
