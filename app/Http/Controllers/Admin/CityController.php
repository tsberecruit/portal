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
use Illuminate\Http\Response;

class CityController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $query = City::query();
        $query->with(['country', 'state']);
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
            'country' => ['required', 'integer'],
            'state' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255']
        ]);

        $city = new City();
        $city->name = $request->city;
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
        $city = City::findOrFail($id);
        $countries = Country::all();
        $states = State::where('country_id', $city->country_id)->get();
        return view('admin.location.city.edit', compact('countries', 'city', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'country' => ['required', 'integer'],
            'state' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255']
        ]);

        $city = City::findOrFail($id);
        $city->name = $request->city;
        $city->state_id = $request->state;
        $city->country_id = $request->country;
        $city->save();
        Notify::UpdatedNotification();



        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try {
            City::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please, Try Again!'], 500);
        }
    }
}
