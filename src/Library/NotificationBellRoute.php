<?php


namespace NotificationBell\Library;


use Illuminate\Support\Facades\Route;

class NotificationBellRoute
{

    public static function routes()
    {
        Route::get('/example/notificationbell', [\NotificationBell\Http\Controllers\PageNotificationBellController::class, 'index']);
    }

}
