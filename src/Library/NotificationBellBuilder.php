<?php


namespace NotificationBell\Library;


use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use NotificationBell\Models\NotificationBell;

class NotificationBellBuilder {

    public NotificationBell $nb;

    public static function New() {

        $b = new NotificationBellBuilder();
        $b->nb = new NotificationBell();
        return $b;
    }

    public function SetTitle( $txt ) {
        $this->nb->title = $txt;
        return $this;
    }

    public function SetMessage( $txt ) {
        $this->nb->message = $txt;
        return $this;
    }

    public function SetImage( $txt ) {
        $this->nb->image = $txt;
        return $this;
    }

    public function SetBtn( $txt, $href ) {
        $this->nb->link_name = $txt;
        $this->nb->link_href = $href;
        return $this;
    }

    public function SendToUser( User $user ) {
        $this->nb->user_id = $user->id;
        // $nb = $this->nb::clone();
        $this->nb->save();
        // $this->nb =$nb;

        return $this;
    }

    /**
     * @param User|integer $uid
     * @param $message
     * @param $link
     * @return void
     */
    public static function Short( $uid, $message, $link = null ) {
        $nb = new  NotificationBell();

        if(is_int($uid)) {
            $nb->user_id = $uid;
        }else{
            $nb->user_id = $uid->id;
        }
        $nb->message = $uid;

        if($link){
            $nb->link_name="Перейти";
            $nb->link_href=$link;
        }
        //NotificationBellBuilder::Short(Auth::user(),  );
        $nb->save();
    }


    public static function dateRus( $time ) {
        $month_name = [1 => 'янв', 2 => 'фев', 3 => 'мар', 4 => 'апр', 5 => 'мая', 6 => 'июн', 7 => 'июл', 8 => 'авг', 9 => 'сен', 10 => 'окт', 11 => 'ноя', 12 => 'дек',];

        $month = $month_name[date('n', $time)];

        $day = date('j', $time);
        $year = date('Y', $time);
        $hour = date('G', $time);
        $min = date('i', $time);

        $date = $day . ' ' . $month . ' ' . $year;

        return $date;
    }


    static function date_draw( $time, $returnIfNull = 'Не указано' ) {
        if ($time <= 10) return $returnIfNull;


        return date("d.m.Y", $time);

    }

    /**
     * Крутая фича что бы разбавить любой интерфейс. Из юникса возвращает строку "5 минут назад".
     * @param $time unix Юникс время
     * @param $returnIfNull string Текст который вернется если дата null
     * @return string
     */
    static function time_back( $time, $returnIfNull = 'Не указано' ) {


        if ($time <= 10) return $returnIfNull;

        if ($time > time()) {
            return time_downcounter($time);
        }

        $month_name = [1 => 'янв', 2 => 'фев', 3 => 'мар', 4 => 'апр', 5 => 'мая', 6 => 'июн', 7 => 'июл', 8 => 'авг', 9 => 'сен', 10 => 'окт', 11 => 'ноя', 12 => 'дек',];

        $month = $month_name[date('n', $time)];

        $day = date('j', $time);
        $year = date('Y', $time);
        $hour = date('G', $time);
        $min = date('i', $time);

        $date = $day . ' ' . $month . ' ' . $year . '  в ' . $hour . ':' . $min;

        $dif = time() - $time;

        if ($dif < 59) {
            return $dif . " сек. назад";
        } else if ($dif / 60 > 1 and $dif / 60 < 59) {
            return round($dif / 60) . " мин. назад";
        } else if ($dif / 3600 > 1 and $dif / 3600 < 23) {
            return round($dif / 3600) . " час. назад";
        } else {
            return $date;
        }
    }


}
