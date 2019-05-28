<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function readNoti($id)
    {
        $noti = Notification::find($id);
        $noti->update(['read_at' => now()]);
        return response()->json(['status' => 0]);
    }

    public function markAllNoti()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['status'=>0]);
    }
}
