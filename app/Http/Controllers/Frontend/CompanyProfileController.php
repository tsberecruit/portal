<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyFoundingInfUpdateRequest;
use App\Http\Requests\Frontend\CompanyinfoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class CompanyProfileController extends Controller
{
    use FileUploadTrait;

    function index() : view {
        $companyInfo = Company::where('user_id', auth()->user()->id)->first();
        return view('frontend.company-dashboard.profile.index', compact('companyInfo'));
    }
    function updateCompanyInfo(CompanyInfoUpdateRequest $request) : RedirectResponse
    {
        $logoPath = $this->uploadfile($request, 'logo');
        $bannerPath = $this->uploadfile($request, 'banner');

        $data = [];
        if(!empty($logoPath)) $data['logo'] = $logoPath;
        if(!empty($bannerPath)) $data['banner'] = $bannerPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        Company::updateOrCreate(
            ['user_id'=> auth()->user()->id],
            $data
        );

        notify()->success('Updated Successfully ⚡️', 'Success');

        return redirect()->back();

    }

    function updateFoundingInfo(CompanyFoundingInfUpdateRequest $request) : RedirectResponse
    {

        Company::updateOrCreate(
            ['user_id'=> auth()->user()->id],
            [
                'industry_type_id' => $request->industry_type,
                'organization_type_id' => $request->organization_type,
                'team_size_id' => $request->team_size,
                'establishment_date' => $request->establishment_date,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link
            ]
        );

        notify()->success('Updated Successfully ⚡️', 'Success');

        return redirect()->back();
    }

    function updateAccountInfo(Request $request) : RedirectResponse 
    {
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email']
        ]);
        Auth::user()->update($validateData);

        notify()->success('Updated Successfully ⚡️', 'Success');

        return redirect()->back();
    }

    function updatePassword(Request $request) : RedirectResponse 
    {
        $validateData = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::default()]
        ]);

        Auth::user()->update(['passwrd' => bcrypt($request->password)]);

        notify()->success('Updated Successfully ⚡️', 'Success');

        return redirect()->back();
    }
}
