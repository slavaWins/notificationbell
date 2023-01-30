<?php

namespace NotificationBell\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationBellMailable extends Mailable {
    use Queueable, SerializesModels;

    public   $nb;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(  $nb ) {
        $this->nb = $nb;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->markdown('notificationbell.email')->subject($this->nb->title ?? "Уведомление")->with(['nb' => $this->nb,]);
    }
}
