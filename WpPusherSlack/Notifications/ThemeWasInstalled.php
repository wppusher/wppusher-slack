<?php

namespace WpPusherSlack\Notifications;

class ThemeWasInstalled implements Notification
{
    private $stylesheet;

    public static function fromStylesheet(\Pusher\Actions\ThemeWasInstalled $action)
    {
        $notification = new static;

        $notification->stylesheet = $action->theme->stylesheet;

        return $notification;
    }

    public function getMessage()
    {
        return 'Theme `' . $this->stylesheet . '` was installed on `' . site_url() . '`';
    }
}
