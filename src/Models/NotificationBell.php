<?php

namespace NotificationBell\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NotificationBell\Mail\NotificationBellMailable;
use Illuminate\Support\Facades\Mail;

/**
 * @property int id
 * @property int is_view
 * @property string title
 * @property string message
 * @property string link_name
 * @property string link_href
 * @property string image
 * @property string is_hidden
 * @property string is_email_sended
 * @property string user_id
 * @property User user
 * @property Carbon created_at
 *
 **/
class NotificationBell extends Model
{
    use HasFactory;


    public function SendToEmail()
    {
        if (!$this->user) return false;
        if (!$this->user->email) return false;

        if (!substr_count($this->user->email, "@")) return false;
        Mail::to($this->user->email)->send(new NotificationBellMailable($this));

    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
