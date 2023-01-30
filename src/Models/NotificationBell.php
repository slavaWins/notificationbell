<?php

namespace NotificationBell\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class NotificationBell extends Model {
    use HasFactory;


    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
}
