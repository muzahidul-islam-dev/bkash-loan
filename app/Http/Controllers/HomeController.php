<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $services = Service::with('service_values')->get();
        return view('front-end.home', compact('services'));
    }
}
