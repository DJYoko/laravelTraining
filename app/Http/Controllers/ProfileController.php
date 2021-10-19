<?php

namespace App\Http\Controllers;

// use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function home(){
        return view('page.profile.index');
    }

}
