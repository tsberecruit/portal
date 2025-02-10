<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\BvSkill;
use App\Traits\Searchable;
use App\Services\Notify;

class BvSkillController extends Controller
{
    use searchable;
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $query = BvSkill::query();
        $this->search($query, ['name']);
        $bvskills = $query->paginate(20);
        return view('admin.bvskills.index', compact('bvskills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bvskills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:bv_skills,name']
        ]);

        $bvskill = new BvSkill();
        $bvskill->name = $request->name;
        $bvskill->save();

        Notify::createdNotification();

        return to_route('admin.bvskills.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bvskill = BvSkill::findOrFail($id);
        return view('admin.bvskills.edit', compact('bvskill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:bv_skills,name,'.$id]
        ]);

        $bvskill = BvSkill::findOrFail($id);
        $bvskill->name = $request->name;
        $bvskill->save();

        Notify::updatedNotification();

        return to_route('admin.bvskills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            BvSkill::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please, Try Again!'], 500);
        }
    }
}
