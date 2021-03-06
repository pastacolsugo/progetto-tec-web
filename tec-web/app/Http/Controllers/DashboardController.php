<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(Request $request){
        $user = Auth::user();
        $isSeller = $user->isSeller;

        return view('dashboard', ['isSeller' => $isSeller]);
    }
}
