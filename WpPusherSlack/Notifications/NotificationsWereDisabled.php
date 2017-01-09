<?php

namespace WpPusherSlack\Notifications;

class NotificationsWereDisabled implements Notification
{
    protected $name;

    public static function fromUser( $user )
    {
        $notification = new static;

        $notification->name = $user->display_name;

        return $notification;
    }

    public function getMessage()
    {
        return 'WP Pusher notifications were disabled on `' . site_url() . '` by `' . $this->name . '`.';
    }
}
