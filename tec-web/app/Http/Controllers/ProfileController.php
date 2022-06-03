<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function editProfile(Request $request) {
        $user = User::where("id", Auth::id())->first();
        return view('editProfile', ['user' => $user]);
    }

    public function editProfileRequest(Request $request) {
        if (Auth::user() == null)
            return Response("User not logged in", 401);

        $mandatoryFields = [
            'name',
            'email',
            'isSeller'
        ];

        foreach ($mandatoryFields as $f) {
            if (!$request->has($f))
                return Response("Missing fields", 422);
        }

        $user = User::where('id', Auth::id())->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->isSeller = $request->isSeller;
        $user->save();

        return redirect()->route('dashboard');
    }
}
