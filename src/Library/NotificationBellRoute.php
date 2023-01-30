<?php


namespace NotificationBell\Library;


use Illuminate\Support\Facades\Route;

class NotificationBellRoute {

    public static function routes() {
        Route::get('/notificationbell/view_all', [\NotificationBell\Http\Controllers\PageNotificationBellController::class, 'view_all']);
        Route::post('/notificationbell', [\NotificationBell\Http\Controllers\PageNotificationBellController::class, 'list']);
        Route::post('/admin/notificationbell/create', [\NotificationBell\Http\Controllers\PageNotificationBellController::class, 'create'])->name("admin.notification.sendpost");
    }

}
