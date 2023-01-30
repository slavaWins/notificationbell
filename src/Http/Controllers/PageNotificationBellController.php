<?php

namespace NotificationBell\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageNotificationBellController extends Controller
{


    public function index()
    {
        return view('notificationbell::page');
    }
}
