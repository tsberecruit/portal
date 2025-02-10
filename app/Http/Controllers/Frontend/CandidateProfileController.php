<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateAccountInfoUpdateRequest;
use App\Http\Requests\Frontend\CandidateBasicProfileUpdateRequest;
use App\Http\Requests\Frontend\CandidateProfileInfoUpdateRequest;
use App\Models\BvSkill;
use App\Models\Candidate;
use App\Models\CandidateBvSkill;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\City;
use App\Models\Country;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\State;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;





class CandidateProfileController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    function index() : view
    {
        $candidate = Candidate::with(['skills'])->where('user_id', auth()->user()?->id)->first();
        $candidateExperiences = CandidateExperience::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();
        $candidateEducation = CandidateEducation::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();


        $experiences = Experience::all();
        $professions = Profession::all();
        $candidate = Candidate::with(['skills'])->where('user_id', auth()->user()?->id)->first();
        $skills = Skill::all();
        $bvskills = BvSkill::all();
        $languages = Language::all();
        $countries = Country::all();
        $states = State::where('country_id', $candidate?->country)->get();
        $cities = City::where('state_id', $candidate?->state)->get();
        return view('frontend.candidate-dashboard.profile.index', compact('candidate', 'experiences', 'professions', 'skills', 'bvskills', 'languages', 'candidateExperiences', 'candidateEducation', 'countries', 'states', 'cities'));
    }

    /** update basic info of candidate profile */
    function basicInfoUpdate(CandidateBasicProfileUpdateRequest $request) : RedirectResponse {
        // handle files
        $imagePath = $this->uploadFile($request, 'profile_picture');
        $cvPath = $this->uploadFile($request, 'cv');

        $data = [];
        if(!empty($imagePath)) $data['image'] = $imagePath;
        if(!empty($cvPath)) $data['cv'] = $cvPath;
        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experience_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->date_of_birth;

        // updating data
        Candidate::updateOrCreate(
            ['user_id' => auth()?->user()->id],
            $data
        );

        $this->updateProfileStatus();

        Notify::updatedNotification();

        return redirect()->back();
    }



    function profileInfoUpdate(CandidateProfileInfoUpdateRequest $request) : RedirectResponse {

        $data = [];
        $data['gender'] = $request->gender;
        $data['marital_status'] = $request->marital_status;
        $data['children'] = $request->children;
        $data['profession_id'] = $request->profession;
        $data['status'] = $request->availability;
        $data['bio'] = $request->biography;

         // updating data
        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        CandidateLanguage::where('candidate_id', $candidate->id)?->delete();
        foreach($request->language_you_know as $language) {
            $candidateLang = new CandidateLanguage();
            $candidateLang->candidate_id = $candidate->id;
            $candidateLang->language_id = $language;
            $candidateLang->save();
        }

        CandidateSkill::where('candidate_id', $candidate->id)?->delete();
        foreach($request->skill_you_have as $skill) {
            $candidateSkill = new CandidateSkill();
            $candidateSkill->candidate_id = $candidate->id;
            $candidateSkill->skill_id = $skill;
            $candidateSkill->save();
        }

        CandidateBvSkill::where('candidate_id', $candidate->id)?->delete();
        foreach($request->bv_skill_you_have as $bvskill) {
            $candidateBvSkill = new CandidateBvSkill();
            $candidateBvSkill->candidate_id = $candidate->id;
            $candidateBvSkill->bv_skill_id = $bvskill;
            $candidateBvSkill->save();
        }

        $this->updateProfileStatus();

        Notify::updatedNotification();

        return redirect()->back();
    }



    // Account Info Update
    function AccountInfoUpdate(CandidateAccountInfoUpdateRequest $request) : RedirectResponse {
        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'phone_one' => $request->phone,
                'phone_two' => $request->secondary_phone,
                'email' => $request->email,
            ]
        );

        $this->updateProfileStatus();

        Notify::updatedNotification();

        return redirect()->back();
    }


    // Account Email Update
    function AccountEmailUpdate(Request $request) : RedirectResponse {
        $request->validate([
            'account_email' => ['required', 'email']
        ]);

        Auth::user()->update(['email' => $request->account_email]);
        Notify::updatedNotification();

        return redirect()->back();
    }


    // Account Password Update
    function AccountPasswordUpdate(Request $request) : RedirectResponse {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);
        Notify::updatedNotification();

        return redirect()->back();
    }


    // update profile complete status
    function updateProfileStatus() : void {
        if(isCandidateProfileComplete()) {
            $candidate = Candidate::where('user_id', auth()->user()->id)->first();
            $candidate->profile_complete = 1;
            $candidate->visibility = 1;
            $candidate->save();
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    function create()
    {

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
