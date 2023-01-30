<?php

namespace NotificationBell\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ResponseApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use NotificationBell\Library\NotificationBellBuilder;
use NotificationBell\Models\NotificationBell;

class PageNotificationBellController extends Controller {


    public function create( Request $request ) {
        /** @var User $user */
        $user = Auth::user();
        if (!$user) return ResponseApi::Error("no user");


        if (!$user->is_admin) return ResponseApi::Error("no admin user");


        $b = NotificationBellBuilder::New()->SetTitle($request->toArray() ['title'] ?? "Уведомление")->SetMessage($request->toArray() ['message'] ?? "Уведомление");

        if (!empty($request->toArray()['link'] ?? "")) {
            $b->SetBtn('Перейти', $request->toArray() ['link']);
        }
        $b->SendToUser(intval($request->toArray() ['uid'] ?? 0));


        return ResponseApi::Successful();
    }


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
            $html .= view("notificationbell.content", ['nb' => $nb]);
            if (!$nb->is_view) $isNew = true;
        }

        if ($isNew) {
            $user->NotificatioNViewAll();
        }

        $response = [];
        $response['html'] = $html . '';
        $response['isNew'] = $isNew;

        return ResponseApi::Data($response);

    }

}
