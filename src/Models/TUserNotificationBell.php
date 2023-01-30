<?php

namespace NotificationBell\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        return NotificationBell::where("user_id", $this->id)->where("is_view", false)->exists();
    }

    public function GetNotifications() {
        return NotificationBell::where("user_id", $this->id)->get();
    }

    public function NotificatioNViewAll() {
        NotificationBell::where("user_id", $this->id)->where("is_view", false)->update(['is_view' => true]);
    }
    public function SendNotification() {
        return NotificationBellBuilder::New();
    }

}
