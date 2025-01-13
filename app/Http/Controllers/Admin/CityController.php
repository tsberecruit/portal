<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\Notify;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\RedirectResponse;

class CityController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $query = City::query();
        $query->with('country', 'state');
        $this->search($query, ['name']);
        $cities = $query->orderBy('id', 'DESC')->paginate(20);
        return view('admin.location.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $countries = Country::all();
        return view('admin.location.city.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'state' => ['required', 'integer'],
            'country' => ['required', 'integer']
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->state_id = $request->state;
        $city->country_id = $request->country;
        $city->save();
        Notify::createdNotification();

        return to_route('admin.cities.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::findOrFail($id);
        return view('admin.location.city.edit', compact('countries', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'state' => ['required', 'integer'],
            'country' => ['required', 'integer']
        ]);

        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->state_id = $request->state;
        $city->country_id = $request->country;
        $city->save();
        Notify::updatedNotification();

        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            city::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please, Try Again!'], 500);
        }
    }
}
