<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateTrackingController extends Controller
{
    function trackCandidateApplication()  : view {
        return view('frontend.candidate-dashboard.tracking-candidate');
    }
    
}