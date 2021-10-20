<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CircleController extends Controller
{
    public function index()
    {
        return view('page.circle.index');
    }

    public function create(Request $request)
    {
        return view('page.circle.create');
    }
}
