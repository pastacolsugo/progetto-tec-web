<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{

    public function show()
    {
        if(auth()->user()->notifications){
            $notifications = auth()->user()->unreadNotifications;
        }
        else{
            $notifications = null;
        }

        return view('notifications', ['notifications' => $notifications]);
    }

    public function markNotification($id)
    {   
        if($id == 'mark-all')
        {
            auth()->user()->unreadNotifications->markAsRead();
        }
        else
        {
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return redirect()->route('notifications');
    }

}
