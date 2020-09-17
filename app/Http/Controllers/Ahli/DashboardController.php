<?php

namespace App\Http\Controllers\Ahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('ahli.dashboard.index');
    }
}
