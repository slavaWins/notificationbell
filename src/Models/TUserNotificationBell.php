<?php

namespace NotificationBell\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use NotificationBell\Library\NotificationBellBuilder;

/**
 * @property int id
 * @property int is_view
 * @property string title
 * @property string message
 * @property string link_name
 * @property string link_href
 * @property string image
 * @property string user_id
 * @property User user
 * @property Carbon created_at
 *
 **/
trait TUserNotificationBell {


    public function ExistNotifications() {
        return Cache::remember( "notiftbellExist_".$this->id, 60*15 , function () {
            return NotificationBell::where("user_id", $this->id)->where("is_view", false)->exists();
        });
    }

    public function GetNotifications() {
        return NotificationBell::where("user_id", $this->id)->get();
    }

    public function NotificatioClearCached() {
        Cache::forget("notiftbellExist_".$this->id);
    }

    public function NotificatioNViewAll() {
        $this->NotificatioClearCached();
        NotificationBell::where("user_id", $this->id)->where("is_view", false)->update(['is_view' => true]);
    }

    public function SendNotification() {
        $this->NotificatioClearCached();
        return NotificationBellBuilder::New();
    }

}
