<?php

    namespace App\Http\Controllers\NotificationBell;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class NotificationBellController extends Controller
    {


        public function index() {


            return view('notificationbell.example');

        }
    }
