<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotificationCount()
    {
        $count = Auth::user()->unreadNotifications->count();

        return response()->json(['count' => $count]);
    }
    public function index()
    {
        // Retrieve and return all notifications
        $notifications = auth()->user()->notifications;

        return view('notifications.index', ['notifications' => $notifications]);
    }
    public function unreadNotifications()
{
    return $this->notifications()->whereNull('read_at');
}

}
