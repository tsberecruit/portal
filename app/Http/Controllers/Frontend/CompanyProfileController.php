<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyinfoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    function index() : view {
        return view('frontend.company-dashboard.profile.index');
    }
    function updateCompanyInfo(CompanyInfoUpdateRequest $request) {
        
    }
}
