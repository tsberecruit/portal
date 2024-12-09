<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\view\view;

class DashboardController extends Controller
{
    function index() : view {
        return view('admin.dashboard.index');
    }
}
