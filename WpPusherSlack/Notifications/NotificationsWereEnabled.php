<?php

namespace WpPusherSlack\Notifications;

class NotificationsWereEnabled implements Notification
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
        return 'WP Pusher notifications were enabled on `' . site_url() . '` by `' . $this->name . '`.';
    }
}
