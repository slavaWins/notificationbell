<?php

namespace NotificationBell\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ResponseApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use NotificationBell\Models\NotificationBell;

class PageNotificationBellController extends Controller {


    public function view_all( Request $request ) {
        if (!$request->user()) return;
        /** @var User $user */
        $user = $request->user();

        $user->NotificatioNViewAll();
        return ResponseApi::Successful();
    }

    public function list( Request $request ) {

        if (!$request->user()) return;
        /** @var User $user */
        $user = $request->user();

        $html = '';
        $isNew = false;
        /** @var NotificationBell $nb */
        foreach (NotificationBell::where("user_id", $user->id)->orderBy("id", "desc")->get() as $nb) {
            $html .= view("vendor.notificationbell.content", ['nb' => $nb]);
            if (!$nb->is_view) $isNew = true;
        }

        if($isNew) {
            $user->NotificatioNViewAll();
        }

        $response = [];
        $response['html'] = $html . '';
        $response['isNew'] = $isNew;

        return ResponseApi::Data($response);

    }

}
