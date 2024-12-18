<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyinfoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;
use App\Models\Company;

class CompanyProfileController extends Controller
{
    use FileUploadTrait;

    function index() : view {
        return view('frontend.company-dashboard.profile.index');
    }
    function updateCompanyInfo(CompanyInfoUpdateRequest $request) {
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

        return redirect()->back();


        
    }
}
