<?php

namespace WpPusherSlack\Notifications;

class ThemeWasUpdated implements Notification
{
    private $stylesheet;

    public static function fromStylesheet(\Pusher\Actions\ThemeWasUpdated $action)
    {
        $notification = new static;

        $notification->stylesheet = $action->theme->stylesheet;

        return $notification;
    }

    public function getMessage()
    {
        return 'Theme `' . $this->stylesheet . '` was updated on `' . site_url() . '`';
    }
}
