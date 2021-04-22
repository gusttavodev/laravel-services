<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        // $this->middleware('verified')->only('store');
        // $this->middleware('subscribed')->except('store');
    }
    public function index(){
        return Inertia::render('Dashboard/Index');
    }
}
