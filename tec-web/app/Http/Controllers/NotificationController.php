<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{

    public function show()
    {
        $notifications = User::find(Auth::id())->unreadNotifications;

        return view('notifications');
    }

    public function markNotification(Request $request)
    {
        User::find(Auth::id())->unreadNotifications->where($request->input('id'), function($query) use ($request)
        {
            return $query->where('id', $request->input('id'));
        })->markAsRead();

    }

}
