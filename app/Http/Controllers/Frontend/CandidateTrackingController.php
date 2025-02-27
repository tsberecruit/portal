<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateTrackingController extends Controller
{
    function trackCandidateApplication()  : view {
        return view('frontend.candidate-dashboard.tracking-candidate');
    }

    function applicationTracking(request $request)
    {
        $app_id = $request->app_id;

        //$track = AppliedJob::where('candidate_id',$app_id)->first();

        if ($app_id) {
           return view('frontend.candidate-tracking.track_candidate_status');

        }

        Notify::updatedNotification();

        return redirect()->back();
    }

}
