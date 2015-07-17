<?php

namespace WpPusherSlack\Notifications;

class ThemeWasInstalled implements Notification
{
    private $stylesheet;

    public static function fromStylesheet($stylesheet)
    {
        $notification = new static;

        $notification->stylesheet = $stylesheet;

        return $notification;
    }

    public function getMessage()
    {
        return 'Theme `' . $this->stylesheet . '` was installed on `' . site_url() . '`';
    }
}
