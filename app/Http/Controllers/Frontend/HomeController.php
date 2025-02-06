<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index() : view {
        $plans = Plan::where(['frontend_show' => 1, 'show_at_home' => 1])->get();
        return view('frontend.home.index', compact('plans'));
    }
}
